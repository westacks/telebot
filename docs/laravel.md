# Laravel Features

TeleBot library in addition to [Facade](configuration.md#laravel), provides some more artisan commands, for setting your bots webhook, bots commands and even performing long-polling (very usefull for local development).

## Webhook

You may set, remove or display your bots webhook using `telebot:webhook` command. Webhook route is automaticaly generated for all registered bots in config. If your app runs over self-signed SSL or you want to create a custom route for a webhook, you need to customize [webhook](https://core.telegram.org/bots/api#setwebhook) parameters for your bot in `config/telebot.php`. When you configured webhook config, you may use this command to manage your webhook on telegram servers:

<!-- tabs:start -->

#### ** Webhook usage **

```bash
# Run command with --help flag to see more details
php artisan telebot:webhook
```

#### ** Webhook config **

```php
// config/telebot.php

<?php

return [

  'default' => 'bot',

  'bots' => [
    'bot'   => [
      'token'   => env('TELEGRAM_BOT_TOKEN'),
      'webhook' => [
        // 'url'               => env('TELEGRAM_BOT_WEBHOOK_URL', env('APP_URL').'/telebot/webhook/bot/'.env('TELEGRAM_BOT_TOKEN')),
        // 'certificate'       => env('TELEGRAM_BOT_CERT_PATH', storage_path('app/ssl/public.pem')),
        // 'max_connections'   => 40,
        // 'ip_address'        => '8.8.8.8',
        // 'allowed_updates'   => ["message", "edited_channel_post", "callback_query"],
        // 'secret_token'      => env('TELEGRAM_KEY', null),
      ]
    ]
];
```
<!-- tabs:end -->

## Long Polling

You may run long polling proccess from console using `telebot:polling` command. You may specify your [poll](https://core.telegram.org/bots/api#getupdates) parameters for your bot in `config/telebot.php`:

<!-- tabs:start -->

#### ** Polling usage **

```bash
# Run command with --help flag to see more details
php artisan telebot:polling
```

#### ** Polling config **

```php
// config/telebot.php

<?php

return [

  'default' => 'bot',

  'bots' => [
    'bot'   => [
      'token'   => env('TELEGRAM_BOT_TOKEN'),
      'poll'    => [
        // 'limit'             => 100,
        // 'timeout'           => 0,
        // 'allowed_updates'   => ["message", "edited_channel_post", "callback_query"]
      ],
    ]
];
```
<!-- tabs:end -->


## Bot commands

You may send your localy registered bot commands into Telegram API for user's autocompletion using `telebot:commands` command. All *registered* commands in bot config will be sent.

<!-- tabs:start -->

#### ** Commands usage **

```bash
# Run command with --help flag to see more details
php artisan telebot:commands
```

#### ** Commands config **

```php
// config/telebot.php

<?php

return [

  'default' => 'bot',

  'bots' => [
    'bot'   => [
      'token'     => env('TELEGRAM_BOT_TOKEN'),
      'handlers'  => [
          // All bot commands should extend WeStacks\TeleBot\Handlers\CommandHandler class
          // and should be registered here

          \App\Services\Telegram\Commands\StartCommand::class // app/Services/Telegram/Commands/StartCommand.php
      ],
    ]
];
```
<!-- tabs:end -->

## Notification Channel

You may send notifications to your users using TeleBot's notification channel for Laravel. See [official Laravel docs](https://laravel.com/docs/notifications) for more details.

```php
<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use WeStacks\TeleBot\Laravel\TelegramNotification;

class TelegramNotification extends Notification
{
    public function via($notifiable)
    {
        return ['telegram'];
    }

    public function toTelegram($notifiable)
    {
        return (new TelegramNotification)->bot('bot')
            ->sendMessage([
                'chat_id' => $notifiable->telegram_chat_id,
                'text'    => 'Hello, from Laravel\'s notifications!'
            ])
            ->sendMessage([
                'chat_id' => $notifiable->telegram_chat_id,
                'text'    => 'Second message'
            ]);
    }
}
```

## Authorizing Web Apps

You may easily authorize [Web Apps](https://core.telegram.org/bots/webapps) requests using inbuilt middleware:

<!-- tabs:start -->

#### ** Creating route **

```php
// routes/api.php

Route::post('/action', function(Request $request) {
    $request->telegramWebAppUser('id'); // ID of telegram user
})->middleware('telebot-webapp');
```

#### ** Sending request from Web App **

```js
// web-app.js
import axios from 'axios';

axios.post('/action', { test: 123 }, {
  headers: { 'X-Telegram-Web-App': Telegram.WebApp.initData }
})

```
<!-- tabs:end -->

## Log driver

You may log your application errors by sending them to some Telegram chat. Simply add new log driver to a `config/logging.php`:

```php
'telegram' => [
    'driver'    => 'custom',
    'via'       => \WeStacks\TeleBot\Laravel\Log\TelegramLogger::class,
    'level'     => 'debug',
    'bot'       => 'bot',
    'chat_id'   => env('TELEGRAM_LOG_CHAT_ID') // Any chat where bot can write messages.
]
```
