# Laravel Features

TeleBot library in addition to [Facade](configuration.md#laravel), provides some more artisan commands, for setting your bots webhook, bots commands and even performing long-polling (very usefull for local development).

## Webhook

You may set, remove or display your bots webhook using `telebot:webhook` command. For that you need to specify your [setWebhook method parameters](https://core.telegram.org/bots/api#setwebhook) for your bot in `config/telebot.php`:

<!-- tabs:start -->

#### ** Webhook usage **

```bash
php artisan telebot:webhook --help
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
        'url'               => env('TELEGRAM_BOT_WEBHOOK_URL', 'https://telebot.westacks.com.ua/webhook'),
        // 'certificate'       => env('TELEGRAM_BOT_CERT_PATH', storage_path('app/ssl/public.pem')),
        // 'max_connections'   => 40,
        // 'allowed_updates'   => ["message", "edited_channel_post", "callback_query"]
      ]
    ]
];
```
<!-- tabs:end -->

## Long Polling

You may run bot polling from console using `telebot:polling` command. You may specify your [getUpdates method parameters](https://core.telegram.org/bots/api#getupdates) for your bot in `config/telebot.php`:

<!-- tabs:start -->

#### ** Polling usage **

```bash
php artisan telebot:polling --help
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

You may send your localy registered bot commands into Telegram API for user's autocompletion using `telebot:commands` command. All registered commands in bot config will be sent.

<!-- tabs:start -->

#### ** Commands usage **

```bash
php artisan telebot:commands --help
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
          \App\Services\Telegram\Commands\StartCommand::class
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
use WeStacks\TeleBot\Laravel\TelegramChannel;

class TelegramNotification extends Notification
{
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable): array
    {
        return [
            'bot'       => 'bot',           // Optional. Bot name to send notification. Default bot used if not specified
            'method'    => 'sendMessage',   // Optional. Telebram Bot API method to send notification. Default: `sendMessage`
            'data'      => [                // Method parameters
                'chat_id'   => $notifiable->telegram_chat_id,
                'text'      => "Hello, from Laravel's notifications!" 
            ]
        ];
    }
}
```