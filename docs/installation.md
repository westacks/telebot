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

Only Laravel version 5.5 or greater supported by the library!

If you are using Laravel, the library will self-register its ServiceProvider and Facade using Laravel's auto-discovery. If you are not using Laravel auto-discovery, you need to add the ServiceProvider to the providers array in `config/app.php`:

```php 
WeStacks\TeleBot\Laravel\TeleBotServiceProvider::class
```

and if you want to use the facade to access Telegram API, add this to your facades in `config/app.php`:

```php
'TeleBot' => WeStacks\TeleBot\Laravel\TeleBot::class,
```

### Publish Configuration File

Open your terminal window and fire the following command to publish config file to your config directory:

```bash
php artisan vendor:publish --provider="WeStacks\TeleBot\Laravel\TeleBotServiceProvider"
```
Now you can find your bots config on `config/telebot.php` file. To see more details about config parameters, you should be acquainted with `BotManager` [config](configuration.md#bot-manager-config))