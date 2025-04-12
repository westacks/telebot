# Methods

The bot instance can execute all methods listed in the official Telegram Bot API [documentation](https://core.telegram.org/bots/api#available-methods) using the following syntax:


:::tabs
== Named arguments
```php
$bot = new TeleBot('<your bot token>');

// See docs for details: https://core.telegram.org/bots/api#sendmessage
$message = $bot->sendMessage(
    chat_id: 1234567890,
    text: 'Test message',
    reply_markup: [
        'inline_keyboard' => [[[
            'text' => 'Google',
            'url' => 'https://google.com/'
        ]]]
    ]
);
```
== Array syntax
```php
$bot = new TeleBot('<your bot token>');

// See docs for details: https://core.telegram.org/bots/api#sendmessage
$message = $bot->sendMessage([
    'chat_id' => 1234567890,
    'text' => 'Test message',
    'reply_markup' => [
        'inline_keyboard' => [[[
            'text' => 'Google',
            'url' => 'https://google.com/'
        ]]]
    ]
]);
```
:::

## TeleBot Methods

The `WeStacks\TeleBot\TeleBot` class supports **all** official Telegram API methods and adds some useful helper methods:

| Method | Description |
|--------|-------------|
| `handle(Update $update): mixed` | Handle a Telegram [Update](https://core.telegram.org/bots/api#update) using registered handlers. |
| `handler($handler): self` | Register a new update handler (closure or class-based). |
| `purge(): void` | Recreate bot kernel (all handlers will be removed). |
| `setLocalCommands(): bool` | Push locally registered bot commands to Telegram. |
| `deleteLocalCommands(): bool` | Remove registered commands from Telegram. |

---

## BotManager Methods

The `WeStacks\TeleBot\BotManager` supports all `TeleBot` methods and allows managing multiple bots:

| Method | Description |
|--------|-------------|
| `bot(string\|int $name): TeleBot` | Get a specific `TeleBot` instance by name. |
| `bots(): Array<string\|int>` | Get a list of registered bot names. |
| `add(string\|int $name, TeleBot\|string\|array $bot): self` | Add a bot instance to the manager. |
| `remove(string\|int $name): self` | Remove a bot by name. |
| `default(string\|int $name): self` | Set the default bot. |
