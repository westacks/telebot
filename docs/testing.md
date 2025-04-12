# Testing

You may use `fake` method to simulate responses from Telegram API instead of sending real requests:

```php
use Tests\Lib\AskNameHandler;
use Tests\Lib\PopupHandler;
use WeStacks\TeleBot\Foundation\TeleBotResponse;
use WeStacks\TeleBot\Objects;
use WeStacks\TeleBot\TeleBot;

$bot->fake([
    TeleBotResponse::make(Objects\Message::from([
        'message_id' => 2,
        'date' => 1,
        'chat' => [
            'id' => 1,
            'type' => 'private',
        ],
        'text' => 'Please enter your name.',
    ])),
    TeleBotResponse::make(Objects\Message::from([
        'message_id' => 4,
        'date' => 2,
        'chat' => [
            'id' => 1,
            'type' => 'private',
        ],
        'text' => 'Sorry, I don\'t know you.',
    ])),
    TeleBotResponse::make(Objects\Message::from([
        'message_id' => 6,
        'date' => 4,
        'chat' => [
            'id' => 1,
            'type' => 'private',
        ],
        'text' => 'Hello, John!',
    ])),
]);

$bot->handler(AskNameHandler::class)
    ->handler(function (TeleBot $bot, Objects\Update $update, callable $next) {
        if ($update->message()->text !== '/test' ?? null) {
            return $next();
        }

        AskNameHandler::request($bot, $update->user());

        return $bot->sendMessage(
            chat_id: $update->chat()->id,
            text: 'Please enter your name.',
        );
    });

$initialUpdate = Objects\Update::from([
    'update_id' => 1,
    'message' => [
        'message_id' => 1,
        'text' => '/test',
        'from' => [
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Alan',
        ],
        'chat' => [
            'id' => 1,
            'type' => 'private',
        ],
        'date' => 1,
        'entities' => [
            [
                'type' => 'bot_command',
                'offset' => 0,
                'length' => 5
            ]
        ]
    ],
]);

$wrongNameUpdate = Objects\Update::from([
    'update_id' => 2,
    'message' => [
        'message_id' => 3,
        'text' => 'Alan',
        'from' => [
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Alan',
        ],
        'chat' => [
            'id' => 1,
            'type' => 'private',
        ],
        'date' => 2,
    ]
]);

$correctNameUpdate = Objects\Update::from([
    'update_id' => 3,
    'message' => [
        'message_id' => 5,
        'text' => 'John',
        'from' => [
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Alan',
        ],
        'chat' => [
            'id' => 1,
            'type' => 'private',
        ],
        'date' => 4,
    ]
]);

$res = $bot->handle($initialUpdate);
expect($res)->toBeInstanceOf(Objects\Message::class);
expect($res->text)->toBe('Please enter your name.');

$res = $bot->handle($wrongNameUpdate);
expect($res)->toBeInstanceOf(Objects\Message::class);
expect($res->text)->toBe('Sorry, I don\'t know you.');

$res = $bot->handle($correctNameUpdate);
expect($res)->toBeInstanceOf(Objects\Message::class);
expect($res->text)->toBe('Hello, John!');
```