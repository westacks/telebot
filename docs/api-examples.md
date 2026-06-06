# API Examples

Practical examples of using TeleBot with the Telegram Bot API.

## Sending Messages

### Send a text message

```php
use WeStacks\TeleBot\TeleBot;

$bot = new TeleBot('YOUR_BOT_TOKEN');

$bot->sendMessage([
    'chat_id' => 123456789,
    'text' => 'Hello, World!',
]);
```

### Send a message with inline keyboard

```php
$bot->sendMessage([
    'chat_id' => 123456789,
    'text' => 'Choose an option:',
    'reply_markup' => [
        'inline_keyboard' => [
            [
                ['text' => 'Option 1', 'callback_data' => 'option_1'],
                ['text' => 'Option 2', 'callback_data' => 'option_2'],
            ],
            [
                ['text' => 'Cancel', 'callback_data' => 'cancel'],
            ],
        ],
    ],
]);
```

### Send a photo

```php
$bot->sendPhoto([
    'chat_id' => 123456789,
    'photo' => 'https://example.com/image.jpg',
    'caption' => 'Check out this image!',
]);
```

## Handling Updates

### Using webhook

```php
$update = WeStacks\TeleBot\Objects\Update::from(file_get_contents('php://input'));
$bot->handle($update);
```

### Using long polling

```php
foreach ($bot->poll() as $update) {
    $bot->handle($update);
}
```

## Working with Objects

### Accessing nested properties

```php
$update = WeStacks\TeleBot\Objects\Update::from($telegramResponse);

// Standard chaining
$chatId = $update->message->chat->id;

// Dot notation
$text = $update->get('message.text');

// JSON
$json = $update->toJson();

// Array
$array = $update->toArray();
```

## Using Multiple Bots

```php
use WeStacks\TeleBot\BotManager;

$manager = new BotManager([
    'primary' => new TeleBot('BOT1_TOKEN'),
    'secondary' => ['token' => 'BOT2_TOKEN', 'name' => 'MySecondBot'],
]);

// Use default bot
$manager->getMe();

// Use specific bot
$manager->bot('secondary')->getMe();
```

## Error Handling

```php
// Use _rescue to handle exceptions gracefully
$result = $bot->sendMessage(
    _rescue: fn (Throwable $e) => null,
    chat_id: 123456789,
    text: 'Hello!',
);

if ($result === null) {
    // Handle error
}
```

## Working with Promises

```php
$promise = $bot->getMe(_promise: true);

$promise->then(function (User $user) {
    echo $user->first_name;
})->wait();
```
