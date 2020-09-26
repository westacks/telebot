## Creating handlers

The library supports 2 ways to handle updates:

1. **Using `Closure`**

    It is recommended to use closures when handler task is small, so it will not turn your project in total mess:

    ```php
    $bot->addHandler(function(Update $update) {
        // Do something with your update, for example:
        if (!isset($update->message)) return;   // Handle only regular messages
        Log::info($update);                     // Write it to log
    });
    ```

2. **Using `UpdateHandler`**

    It is recommended to use `UpdateHandler`, when you know that given task will be quite complex:

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

## Handling updates

You may run all registered handlers using `handleUpdate()` method

<!-- tabs:start -->

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

In case you want to run one particular handler for an update you may use [`callHandler()`](methods.md#telebot-methods) method. It's not a point is it registered handler, or not.

```php
$bot->callHandler(\Somewhere\InYour\App\YourUpdateHandler::class, $update);
```

## Handling bot commands

Bot commands is quite used feature of Telegram. The library proviedes an `UpdateHandler` expecially for bot commands, so you could work with them more efficiently. All `CommandHandler` classes should be registered to be avaliable for the library, but you still able to call them using [`callHandler()`](methods.md#telebot-methods) method, passing `$force = true` method property.

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