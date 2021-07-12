<p align="center">
<a href="https://github.com/westacks/telebot"><img src="./docs/assets/logo.svg" alt="Project Logo"></a>
</p>

<p align="center">
<a href="https://packagist.org/packages/westacks/telebot"><img src="https://poser.pugx.org/westacks/telebot/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://core.telegram.org/bots/api"><img src="https://img.shields.io/badge/Bot%20API-5.3-blue" alt="Bot API Version"></a>
<a href="https://travis-ci.org/westacks/telebot"><img src="https://travis-ci.org/westacks/telebot.svg" alt="Build Status"></a>
<a href='https://coveralls.io/github/westacks/telebot'><img src='https://coveralls.io/repos/github/westacks/telebot/badge.svg' alt='Coverage Status' /></a>
<a href="https://scrutinizer-ci.com/g/westacks/telebot/"><img alt="Code quality" src="https://img.shields.io/scrutinizer/quality/g/westacks/telebot"></a>
<a href="https://packagist.org/packages/westacks/telebot"><img src="https://poser.pugx.org/westacks/telebot/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/westacks/telebot"><img src="https://poser.pugx.org/westacks/telebot/license.svg" alt="License"></a>
</p>

TeleBot is a PHP library for telegram bots development. Rich Laravel support out of the box. Has an easy, clean, and extendable way to handle telegram Updates.

## Documentation

Documentation for the library can be found on the [website](https://westacks.github.io/telebot/).

## Features
### Bot Manager

Work easily with multiple bots using `BotManager`:
```php
$manager->getMe(); // Fired by default bot specified in BotManager
$manager->bot('bot2')->getMe(); // Fired by `bot2` specified in BotManager
```

### Laravel Support

Library provides a Facade, artisan commands and notification channel to simplify the development process of your bot, if you are using Laravel:

##### Facade
```php
TeleBot::getMe();
TeleBot::bot('bot2')->getMe(); 
```

##### Automatic webhook generation

After you insert your bot token, to create a webhook you need only to fire the following command:
```bash
$ php artisan telebot:webhook --setup
```
Route for handling updates is generated automaticaly for your `APP_URL`


##### Long polling

If you are not using webhook, or want to use bot in local or test environment, you may start long polling by only firyng this command:
```bash
$ php artisan telebot:polling
```

##### Setup commands autocompletion

The following command will automaticaly setup autocompletion for all registered bot commands on Telegram servers: 
```bash
$ php artisan telebot:commands --setup
```

##### Notification channel

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

##### Log driver

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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Dmytro Morozov](https://github.com/PunyFlash)
- [All Contributors](https://github.com/westacks/telebot/graphs/contributors)

## Dontations

Support this project by sending us a tip.

| Currency | Wallet                                 |
| -------- | -------------------------------------- |
| BTC | bc1qfqn93hczerczjj76kcn62nv0c5kt2xqar355g7  |
| ETH | 0xf3762Fdaf4dC0FD623433070F34c2eDC5224724b  |
| BCH | qz23y9vjn8xzgz5j9ztllv6pxflal4p94s87e47edc  |
| LTC | ltc1qu9pdvvh4u5z6a97mevhnueszcu6m5zmx2lsplp |

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
