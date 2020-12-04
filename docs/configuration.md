## Standalone

The first​ step is to initialize the library. Once you do that, You'll get access to all the available API Methods to make requests to Telegram.

<!-- tabs:start -->

#### ** Minimal **

See [config docs](configuration.md#bot-config) for detailed parameters specification.

```php
use WeStacks\TeleBot\TeleBot;

$bot = new TeleBot([
    'token'      => '<telegram api token>',
    'api_url'    => 'https://api.telegram.org'
    'exceptions' => true,
    'async'      => false,
    'handlers'   => []
]);

$bot->getMe();
```

#### ** Advanced **

You may also use bot manager to work comfortable with multiple bots. See [config docs](configuration.md#bot-manager-config) for help.

```php
use WeStacks\TeleBot\BotManager;

$bot = new BotManager([
    'default' => 'bot1',
    'bots' => [
        'bot1' => new TeleBot('<telegram api token>'),
        'bot2' => '<telegram api token>'
    ]
]);

$bot->getMe();                  // Will be executed by 'bot1' as a default bot
$bot->bot('bot2')->getMe();     // Will be executed by 'bot2'
```

<!-- tabs:end -->

## Laravel

If you are using Laravel, you can interact with bot library using `TeleBot` Facade after specifying a [bot manager config](configuration.md#bot-manager-config) in `config/telebot.php`. Also you may specify a `webhook` and `poll` parameter here for [webhook and long-polling](https://core.telegram.org/bots/api#getting-updates) setup using artisan commands. See more details in [Laravel features](laravel.md) section.

<!-- tabs:start -->

#### ** Config **

```php
// config/telebot.php

return [
    'default' => 'bot1',
    'bots' => [
        'bot1' => [
            'token'         => env('TELEGRAM_BOT_TOKEN', '<telegram api token>'),
            'api_url'       => 'https://api.telegram.org',
            'exceptions'    => true,
            'async'         => false,
            'handlers'      => []
        ],
        'bot2' => [
            'token'         => env('TELEGRAM_BOT2_TOKEN', '<telegram api token>')
        ]
    ]
];
```

#### ** Usage **

```php
use WeStacks\TeleBot\Laravel\TeleBot as Bot;

Bot::getMe();                  // Will be executed by 'bot1' as a default bot
Bot::bot('bot2')->getMe();     // Will be executed by 'bot2'
```

<!-- tabs:end -->

## Config parameters

### Bot config

Bot config may be represented as:
* array of `key => value` pairs, where `key` - is parameter name, and `value` - parameter value
* `token` string

#### `token` (string)

* `Required`
* Your telegram bot token. See official Telegram [documentation](https://core.telegram.org/bots/api#authorizing-your-bot).

#### `api_url` (string)

* Default: `https://api.telegram.org`
* API URL which will be used by library's HTTP client (don't confuse with [webhook url](laravel.md#webhook)). If you want to have self hosted Telegram bot API server, you may learn how to do it [here](https://github.com/tdlib/telegram-bot-api).

#### `exceptions` (boolean)

* Default: `true`
* By default, bot throws `TeleBotRequestException` on telegram request errors. You may set this parameter `false`. In this case bot methods will return `false` instead of throwing exception.

#### `async` (boolean)

* Default: `false`
* If you set this parameter `true`, bot methods will return Guzzle Promises, which you can handle mannualy.

#### `handlers` (array)

* Default: `[]`
* Array of your update handlers (closure functions or `UpdateHandler`, `CommandHandler` resolution objects). See more detaile in [Handling updates](updates.md) section

### Bot Manager config

Bot config represented as a array of `key => value` pairs, where `key` - is parameter name, and `value` - parameter value.

#### `default` (string)

* `Optional`
* Default bot name. If you execute a bot method on `BotManager` istance, it will be hanled by this bot. If not specified the first specified bot is used.

#### `bots` (array)

* `Required`
* Bots array. At least one bot should be specified. Each bot should be represented as array of `key => value` pairs, where `key` - is bot name, and `value` - [bot config](configuration.md#bot-config) or existing `TeleBot` instance
