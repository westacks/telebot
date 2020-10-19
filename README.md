<p align="center">
<a href="https://github.com/westacks/telebot"><img src="./docs/assets/logo.svg" alt="Project Logo"></a>
</p>

<p align="center">
<a href="https://packagist.org/packages/westacks/telebot"><img src="https://poser.pugx.org/westacks/telebot/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://core.telegram.org/bots/api"><img src="https://img.shields.io/badge/Bot%20API-4.9-blue" alt="Bot API Version"></a>
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

##### Commands
```bash
# Fire command with `--help` flag to get command info
$ php artisan telebot:webhook --help
$ php artisan telebot:polling --help
$ php artisan telebot:commands --help
```

##### Notification channel

```php
<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class TelegramNotification extends Notification
{
    public function via($notifiable)
    {
        return ['telegram'];
    }

    public function toTelegram($notifiable): array
    {
        return (new TelegramMessage)->bot('bot')->sendMessage([
            'chat_id'   => $notifiable->telegram_chat_id,
            'text'      => 'Hello, from Laravel\'s notifications!'
        ]);
    }
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Dmytro Morozov](https://github.com/PunyFlash)
- [All Contributors](https://github.com/westacks/telebot/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
