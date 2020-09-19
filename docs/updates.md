## Handling updates

Handling [updates](https://core.telegram.org/bots/api#getting-updates) from Telegram is easy as pathing them to 1 method 🙂

<!-- tabs:start -->

#### ** Adding handlers **

```php
$bot = new TeleBot([
    'token' => '<your bot token>',
    'handlers' => [] // Your update handlers
]);

// Delete all handlers from bot instance
$bot->clearHandlers();

// Mannualy adding update handler
// You may give array of handlers - each will be registered
$bot->addHandler(/* Your handlers */);
```

#### ** Handling updates from webhook**

```php
// To handle update from webhook, run `handleUpdate` method with no parameters
// Update will be created from incoming POST request
$update = $bot->handleUpdate();
```

#### ** Handling updates using long polling**

```php
$last_offset = 0;
while (true) {
    $updates = $bot->getUpdates([
        'offset' => $last_offset + 1
    ]);
    foreach ($updates as $update) {
        $bot->handleUpdate($update);
        $last_offset = $update->update_id;
    }
}
```

<!-- tabs:end -->

## Creating handlers

The library supports 2 ways to handle updates:

1. **Using `Closure`**. It is recommended to use closures when handler task is small, so it will not turn your project in total mess:

```php
$handler = function(Update $update) {
    // Do something with your update, for example:
    if (!isset($update->message)) return;   // Handle only regular messages
    Log::info($update);                     // Write it to log
};
$bot->addHandler($handler);
```

2. **Using `UpdateHandler`** class resolution. It is recommended to use, when you know that given task will be quite complex:

<!-- tabs:start -->

#### ** Creating handler **

```php
// YourUpdateHandler.php

<?php

namespace Somewhere\InYour\App;

use WeStacks\TeleBot\Interfaces\UpdateHandler;

class YourUpdateHandler extends UpdateHandler
{
    /**
     * This function should return `true` if this handler
     * should handle given update, or `false` if should not
     * 
     * @param Update $update
     * @return boolean
     */
    public static function trigger(Update $update)
    {
        return isset($update->callback_query); // handle callback queries (example)
    }

    /**
     * This function should handle updates
     * @return void
     */
    public function handle()
    {
        $update = $this->update;
        $bot = $this->bot;
        // Do stuff
    }
}
```

#### ** Registering handler **

```php
// On initialization
$bot = new TeleBot([
    'token' => '<your bot token>',
    'handlers' => [
        \Somewhere\InYour\App\YourUpdateHandler::class
    ]
]);

// On existing bot instance
$bot->addHandler(\Somewhere\InYour\App\YourUpdateHandler::class);
```

<!-- tabs:end -->

## Handling bot commands

Bot commands is quite used feature of Telegram. The library proviedes an `UpdateHandler` expecially for bot commands, so you could work with them more efficiently:

<!-- tabs:start -->

#### ** Creating handler **

```php
// StartCommand.php

<?php

namespace Somewhere\InYour\App;

use WeStacks\TeleBot\Handlers\CommandHandler;

class StartCommand extends CommandHandler
{
    /**
     * Command aliasses that trigger this bot command
     */
    protected static $aliases = [ '/start', '/s' ];

    /**
     * Command description for Telegram API
     */
    protected static $description = 'Send "/start" or "/s" to get "Hello, World!"';

    /**
     * Handle bot command
     */
    public function handle()
    {
        $this->bot->sendMessage([
            'chat_id' => $this->update->message->chat->id,
            'text' => 'Hello, World!'
        ]);
    }
}
```

#### ** Registering commands **

```php
// Adding handler to bot instance
$bot->addHandler(\Somewhere\InYour\App\StartCommand::class);

// Registering commands on Telegram API for user's autocompletion
$bot->setMyCommands([
    'commands' => $this->bot->getLocalCommands()
]);

// Removing all commands from Telegram API
$bot->setMyCommands([
    'commands' => []
]);
```

<!-- tabs:end -->