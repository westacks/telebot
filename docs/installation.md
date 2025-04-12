# Getting Started

Install TeleBot and create your first Telegram bot in 3 minutes.

::: tip Compatibility
- PHP 8.2+
- Latest [Telegram Bot API](https://core.telegram.org/bots/api)
:::


## Installation

Install via Composer:
```bash
composer require westacks/telebot
```

### Framework Integration

In case you are using a PHP framework, you may use adapter packages to have a seamless experience:

- [Laravel](https://github.com/westacks/telebot-laravel)
- ...

::: info Created your own adapter?
[Open a pull request](https://github.com/westacks/telebot/pulls) to share it with the community!
:::

## Basic Example

Now you can use TeleBot in your code:

```php
use WeStacks\TeleBot\TeleBot;

$bot = new TeleBot('YOUR_BOT_TOKEN');
$bot->getMe();
```
