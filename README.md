<p align="center">
<a href="https://github.com/westacks/telebot"><img src="./docs/assets/logo.svg" alt="Project Logo"></a>
</p>

<p align="center">
<a href="https://packagist.org/packages/westacks/telebot"><img src="https://poser.pugx.org/westacks/telebot/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://core.telegram.org/bots/api"><img src="https://img.shields.io/badge/Bot%20API-8.2-blue" alt="Bot API Version"></a>
<a href="https://packagist.org/packages/westacks/telebot"><img src="https://poser.pugx.org/westacks/telebot/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/westacks/telebot"><img src="https://poser.pugx.org/westacks/telebot/license.svg" alt="License"></a>
<a href="https://github.com/westacks/telebot/actions/workflows/main.yml"><img src="https://github.com/westacks/telebot/actions/workflows/main.yml/badge.svg" alt="PHPUnit"></a>
<a href="https://app.fossa.com/projects/git%2Bgithub.com%2Fwestacks%2Ftelebot?ref=badge_shield" alt="FOSSA Status"><img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2Fwestacks%2Ftelebot.svg?type=shield"/></a>
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

### Object oriented and functional handlers

```php
// Functional handler
$handler = function(TeleBot $bot, Update $update, $next) {
    if ($update->message->text === '/start') {
        return $bot->sendMessage([
            'chat_id' => $update->chat()->id,
            'text' => 'Hello, World!'
        ]);
    }

    return $next();
};


// Object oriented handler
class YourUpdateHandler extends CommandHandler
{
    protected static $aliases = ['/start'];
    protected static $description = 'Your description';

    public function handle()
    {
        return $this->sendMessage([
            'text' => 'Hello, World!'
        ]);
    }
}
```

### Laravel Support

Check out [Laravel Adapter](https://github.com/westacks/telebot-laravel) for TeleBot

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Dmytro Morozov](https://github.com/PunyFlash)
- [All Contributors](https://github.com/westacks/telebot/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fwestacks%2Ftelebot.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2Fwestacks%2Ftelebot?ref=badge_large)
