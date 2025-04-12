# Handling Updates

When the bot receives an update, the library passes it through a [pipline](https://refactoring.guru/design-patterns/chain-of-responsibility) of registered handlers. Each handler must check if it should handle the update and may optionally stop further processing.

The library supports two ways to handle updates:

:::tabs
== Using Closure

Use closures for simple tasks to keep your codebase clean:

```php
$handler = function(TeleBot $bot, Update $update, $next) {
    if ($update->message->text === '/start') {
        return $bot->sendMessage(
            chat_id: $update->chat()->id,
            text: 'Hello, World!'
        );
    }

    return $next();
};
```

== Using UpdateHandler

For more complex logic, create a class-based handler:

```php
<?php

namespace App;

use WeStacks\TeleBot\Foundation\UpdateHandler;

class YourUpdateHandler extends UpdateHandler
{
    public function trigger(): bool
    {
        return $this->update->type('message');
    }

    public function handle()
    {
        return $this->sendMessage(
            text: 'Hello, World!'
        );
    }
}
```
> If your `handle()` method returns a value, the process is stopped and that value is returned. If you want the next handler to run, return nothing.
:::



## Registering Handlers

Handlers must be registered in your bot instance:

```php
$bot = new TeleBot([
    'token' => '<your bot token>',
    'kernrel' => [
        \App\YourUpdateHandler::class,
        $handler
    ]
]);

// Or add later
$bot->addHandler(\App\YourUpdateHandler::class);
$bot->addHandler($handler);
```
### Custom Kernel

Customize the handling pipeline by extending `Kernel`.

```php
<?php

namespace App;

use WeStacks\TeleBot\Kernel as TeleBotKernel;
use WeStacks\TeleBot\TeleBot;

class Kernel extends TeleBotKernel
{
    public function __construct()
    {
        parent::__construct([
            \App\YourUpdateHandler::class,
        ]);
    }

    public function setCommands(TeleBot $bot)
    {
        return $bot->setMyCommands([
            'commands' => $this->getLocalCommands(),
            'scope' => 'default'
        ]);
    }

    public function deleteCommands(TeleBot $bot)
    {
        return $bot->deleteMyCommands([
            'scope' => 'default'
        ]);
    }
}
```

```php
$bot = new TeleBot([
    'token' => '<your bot token>',
    'kernel' => \App\Kernel::class
]);
```

## Bot Commands

The library provides a `CommandHandler` for handling bot commands efficiently.

:::tabs
== Creating Command Handler

```php
<?php

namespace App;

use WeStacks\TeleBot\Foundation\CommandHandler;

class StartCommand extends CommandHandler
{
    protected static function aliases(): array
    {
        return ['/start', '/s'];
    }
    protected static function description(?string $locale = null): string
    {
        return trans('Start the bot', locale: $locale);
    }

    public function handle()
    {
        return $this->sendMessage([
            'text' => 'Hello, World!'
        ]);
    }
}
```

== Registering Commands on Telegram

```php
$bot->setLocalCommands();

$bot->deleteLocalCommands();
```
:::

## Requesting User Input

The library has a built-in state storage for requesting user input via `RequestInputHandler`. By default it will handle any update given by the user. You can change this behavior by extending `trigger()` method in your handler.

:::tabs
== Creating Handler

```php
<?php

namespace App;

use WeStacks\TeleBot\Foundation\RequestInputHandler;

class AskNameHandler extends RequestInputHandler
{
    public function handle()
    {
        $data = $this->update->message()->toArray();

        $validator = Validator::make($data, [
            'text' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return $this->sendMessage([
                'text' => 'Invalid input!'
            ]);
        }

        $this->accept();

        $name = $validator->validated()['text'];

        return $this->sendMessage([
            'text' => "Hello, $name!",
        ]);
    }
}
```

== Requesting Input

```php
$handler = function ($bot, $update, $next) {
    if ('/test' !== $update->message()->text ?? null) {
        return $next();
    }

    AskNameHandler::request($bot, $update->user());

    return $bot->sendMessage([
        'chat_id' => $update->chat()->id,
        'text' => 'Please, type your name.',
    ]);
};
```
:::

### Custom State Storage

Default: `WeStacks\TeleBot\Foundation\FileStorage`. You can use Redis, database, or your own.

:::tabs
== Creating Storage

```php
<?php

namespace App;

use App\Models\User;
use WeStacks\TeleBot\Contracts\StorageContract;

class DatabaseStorage implements StorageContract
{
    public function get(string $key, $default = null): mixed
    {
        return User::where('telegram_id', $key)->value('input_state') ?? $default;
    }

    public function set(string $key, $value): true
    {
        return User::where('telegram_id', $key)->update(['input_state' => $value]);
    }

    public function delete(string $key): true
    {
        return $this->set($key, null);
    }
}
```

== Using Storage

```php
$bot = new TeleBot([
    'token' => '<your bot token>',
    'storage' => \App\DatabaseStorage::class,
]);
```
:::

## Callback Queries

Use `CallbackHandler` for managing [callback queries](https://core.telegram.org/bots/api#callbackquery).

```php
<?php

namespace App;

use WeStacks\TeleBot\Foundation\CallbackHandler;

class ButtonPressHandler extends CallbackHandler
{
    protected string $match = "/^test:(delete|update):(\d+)$/";

    public function handle()
    {
        [$action, $id] = $this->arguments();

        match ($action) {
            'update' => $this->update($id),
            'delete' => $this->delete($id),
        };

        $this->answerCallbackQuery();
    }
}
```
## Handling Updates

:::tabs
== Webhook

Telegram will send updates to your webhook URL using POST requests.

```php
$bot->setWebhook([
    'url' => 'https://example.com/webhook.php'
]);

$bot->handle(
    Update::from(file_get_contents('php://input'))
);
```
== Polling
This will create infinite loop that will keep polling the Telegram API for updates.

```php
foreach ($bot->poll() as $update) {
    $bot->handle($update);
}
```
:::
