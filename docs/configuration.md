# Configuration

Configure TeleBot for your PHP projects with these essential settings.

::: tip
Default configuration works for most use cases. Customize only when needed.
:::

## Basic Setup

### Single Bot Configuration
```php
use WeStacks\TeleBot\TeleBot;

$bot = new TeleBot([
    'token' => 'YOUR_BOT_TOKEN', // Required
    'name' => 'MyBot'
]);
```

### Multiple Bot Management
```php
use WeStacks\TeleBot\BotManager;

$bot = new BotManager([
    'primary' => new TeleBot('YOUR_BOT1_TOKEN'),
    'secondary' => [ // Auto-instantiated
        'token' => 'YOUR_BOT2_TOKEN',
        'name' => 'MyBot2'
    ]
]);

$bot->getMe(); // Uses primary bot (first bot)
$bot->bot('secondary')->getMe(); // Uses secondary bot
```

You may also specify a default bot explicitly:

```php
$bot = new BotManager([
    'primary' => new TeleBot('YOUR_BOT1_TOKEN'),
    'secondary' => ['token' => 'YOUR_BOT2_TOKEN', 'name' => 'MyBot2'],
], 'secondary');

$bot->getMe(); // Uses secondary bot (now the default)
```

## Core Parameters

### Bot Configuration
| Parameter | Type | Required | Default | Description |
|-----------|------|----------|---------|-------------|
| `token` | `string` | ✔️ | --- | Telegram bot token |
| `name` | `string` | ❌ | `null` | Bot username for command parsing |
| `api_url` | `string` | ❌ | [Telegram API URL](https://core.telegram.org/bots/api#making-requests) | Custom API endpoint |
| `http` | `array` | ❌ | `[]` | Custom [Guzzle HTTP](https://docs.guzzlephp.org/en/stable/request-options.html) client options for API requests |
| `kernel` | `string\|array` | ❌ | `Kernel::class` | Kernel for update handling or array of handlers |
| `storage` | `string` | ❌ | `FileStorage::class` | Storage driver for user states |

### Manager Configuration

The `BotManager` constructor takes two arguments:

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `$bots` | `array` | `[]` | Array of [bot configs](#bot-configuration) keyed by name |
| `$default` | `string\|int\|null` | `null` | Default bot name (first bot if unset) |
