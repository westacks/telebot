### Requirements

- PHP 7.2+
- Composer
- Telegram bot token ([what is it?](https://core.telegram.org/bots/api#authorizing-your-bot))

## Installing package

You can install the package via composer:

```bash
composer require westacks/telebot
```

## Laravel

If you are using Laravel, the library will self-register its ServiceProvider and Facade using Laravel's auto-discovery. Only Laravel version 5.5+ supported by the library.

### Publish Configuration File

Open your terminal window and fire the following command to publish config file to your config directory:

```bash
php artisan vendor:publish --provider="WeStacks\TeleBot\Laravel\TeleBotServiceProvider"
```
Now you can find your bots config on `config/telebot.php` file.