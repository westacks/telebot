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

TeleBot is a PHP library for telegram bots development. Supports Laravel out of the box, has an easy and clean way to handle telegram Updates.

## Installation

You can install the package via composer:

```bash
composer require westacks/telebot
```

## Usage

``` php
$bot = new TeleBot('<your bot token>');
$botUser = $bot->getMe();
```

Read the full [documentation](https://westacks.github.io/telebot/) for advanced usage.

### Testing

For working tests you should provide a `TELEGRAM_BOT_TOKEN`, `TELEGRAM_CHAT_ID` (group id) and `TELEGRAM_USER_ID` environment variables in your local `phpunit.xml`. Then simply run from your console:

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email puny.flash@gmail.com instead of using the issue tracker.

## Credits

- [Dmytro Morozov](https://github.com/PunyFlash)
- [All Contributors](link-contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.