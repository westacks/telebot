# Methods

The `WeStacks\TeleBot\Bot` instance can execute all methods which provided in official Telegram Bot API [documentstion](https://core.telegram.org/bots/api#available-methods).

## Sending data

```php
$bot = new Bot('<your bot token>');

// See docs for details:  https://core.telegram.org/bots/api#sendmessage
$message = $bot->sendMessage([
    'chat_id' => 1234567890,
    'text' => 'Test message',
    'reply_markup' => Keyboard::create([
        'inline_keyboard' => [
            [
                [
                    'text' => 'Google',
                    'url' => 'https://google.com/'
                ]
            ]
        ]
    ])
]);
```

## Receiving data

<!-- tabs:start -->

#### ** Function's return **

```php
$bot = new Bot('<your bot token>');
$botUser = $bot->getMe();
echo $botUser;
```

#### ** Closure **

```php
$bot = new Bot('<your bot token>');
$bot->getMe(function (User $botUser) {
    echo $botUser; 
});
```


<!-- tabs:end -->