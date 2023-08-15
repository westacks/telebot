### Requirements

- PHP 8.0+
- Composer
- Telegram bot token ([what is it?](https://core.telegram.org/bots/api#authorizing-your-bot))

## Installing package

You can install the package via composer:

```bash
composer require westacks/telebot
```

For laravel, you should install package with adapter

```bash
composer require westacks/telebot-laravel
```

## Migrating from 2.x

For standalone project you can just upgrade package without any breaking changes. But in case you are using Laravel, to migrate the package to newest version you need update your `composer.json`:

```json
// "westacks/telebot": "^2.0",
"westacks/telebot-laravel": "^3.0",
```

## Laravel

Only Laravel version 5.5 or greater supported by the library!

If you are using Laravel, the library will self-register its ServiceProvider and Facade using Laravel's auto-discovery. If you turned off auto-discovery for some reason, you need to register service provider and facade manually in `config/app.php`:

```php
'providers' => [
    /*
     * Package Service Providers...
     */
    WeStacks\TeleBot\Laravel\Providers\TeleBotServiceProvider::class,
],
'aliases' => [
    'TeleBot' => WeStacks\TeleBot\Laravel\TeleBot::class,
]
```

### Publish Configuration File

Open your terminal window and fire the following command to publish config file to your config directory:

```bash
php artisan vendor:publish --provider="WeStacks\TeleBot\Laravel\Providers\TeleBotServiceProvider" --tag=config
```
Now you can find your bots config on `config/telebot.php` file. To see more details about config parameters, you should be acquainted with `BotManager` [config](configuration.md#bot-manager-config))
