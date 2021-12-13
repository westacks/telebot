## Creating handlers

The library supports 2 ways to handle updates:


<!-- tabs:start -->
#### ** Using Closure **

It is recommended to use closures when handler task is small, so it will not turn your project in total mess:

```php
$handler = function(Update $update) {
    // Do something with your update, for example:
    if (!isset($update->message)) return;   // Handle only regular messages
    Log::info($update);                     // Write it to log
};
```
#### ** Using UpdateHandler **

It is recommended to use `UpdateHandler`, when you know that given task will be quite complex. You need to describe 2 methods for each handler you create:

- `public static trigger(Update, TeleBot): bool`

    Determines if this handler should handle incoming update (true - should, false - should not). This method will be ignored if you call `TeleBot::callHandler` with `$force = true` flag.


- `public handle()`

    Your handler function

If you fire [bot method](methods#telebot-methods) on `UpdateHandler` instance, the default values for parameters: `chat_id`, `user_id`, `message_id`, `callback_query_id`, `inline_message_id`, `inline_query_id`, `shipping_query_id`, `pre_checkout_query_id` - will be taken from incoming `Update` object. You still may override them pathing them to array of parameters.

##### Example handler:

```php
// YourUpdateHandler.php

<?php

namespace Somewhere\InYour\App;

use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class YourUpdateHandler extends UpdateHandler
{
    public static function trigger(Update $update, TeleBot $bot): bool
    {
        return isset($update->message); // handle regular messages (example)
    }

    public function handle()
    {
        $update = $this->update;
        $bot = $this->bot;

        // chat_id => $this->update->message->chat->id
        $this->sendMessage([
            'text' => 'Hello, World!'
        ]);
    }
}
```

<!-- tabs:end -->
## Registering handlers 

As you created your handler, you should register it in the bot istance. Bot will automaticaly execute all handlers in order of registration on any incoming update.

```php
// Adding handlers on initialization
$bot = new TeleBot([
    'token' => '<your bot token>',
    'handlers' => [
        \Somewhere\InYour\App\YourUpdateHandler::class,
        $handler
    ]
]);

// Adding handlers on existing bot instance
$bot->addHandler(\Somewhere\InYour\App\YourUpdateHandler::class);
$bot->addHandler($handler);
```

## Bot commands

The library proviedes an `UpdateHandler` expecially for bot commands, so you could work with them more efficiently. All `CommandHandler` classes should be registered to be avaliable for the `getLocalCommands()` method which is handy for [`setMyCommands()`](https://core.telegram.org/bots/api#setmycommands) method. 

<!-- tabs:start -->

#### ** Creating command handler **

```php
// StartCommand.php

<?php

namespace Somewhere\InYour\App;

use WeStacks\TeleBot\Handlers\CommandHandler;

class StartCommand extends CommandHandler
{
    protected static $aliases = [ '/start', '/s' ];
    protected static $description = 'Send "/start" or "/s" to get "Hello, World!"';

    public function handle()
    {
        $this->sendMessage([
            'text' => 'Hello, World!'
        ]);
    }
}
```

#### ** Registering handler **

```php
// Adding handlers on initialization
$bot = new TeleBot([
    'token' => '<your bot token>',
    'handlers' => [
        \Somewhere\InYour\App\StartCommand::class,
    ]
]);

// Adding handlers on existing bot instance
$bot->addHandler(\Somewhere\InYour\App\StartCommand::class);
```

#### ** Registering commands on Telegram servers **

##### Standalone:

```php
// Registering commands on Telegram API for user's autocompletion
$bot->setMyCommands([
    'commands' => $bot->getLocalCommands()
]);

// Removing all commands from Telegram API
$bot->setMyCommands([
    'commands' => []
]);
```

##### Laravel:
```bash
## Registering commands on Telegram API for user's autocompletion
php artisan telebot:commands --setup

## Removing all commands from Telegram API
php artisan telebot:commands --remove
```

<!-- tabs:end -->
## Handling updates

You may run all registered handlers using `handleUpdate()` method

<!-- tabs:start -->

#### ** Handling updates from webhook**

##### Standalone:

```php
// Register webhook route
$bot->setWebhook([
    'url' => 'https://example.com/webhook.php'
])

// To handle update from webhook, run `handleUpdate` method with no parameters
// Update will be created from incoming POST request
$update = $bot->handleUpdate();
```

##### Laravel:

Library automaticaly creates a route for handling your webhook. You need only register it:

```bash
## Register webhook route
php artisan telebot:webhook --setup
```

#### ** Handling updates using long polling**

Long polling is not that optimal sollution as a webhook and works much slower. But it's realy usefull for local development if you don't want to deploy your bot each time to test your whole application.
##### Standalone:

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

##### Laravel

```bash
## Simply run to listen for new incoming updates
php artisan telebot:polling
```

<!-- tabs:end -->

If you are using Laravel Sail as your dev-environment or handle commands by long polling in production, this will be smart to add process to your `supervisor.d` configuration:

```conf
[program:telebot-polling]
command=php /var/www/html/artisan telebot:polling
autostart=true
autorestart=true
user=sail
redirect_stderr=true
stdout_logfile=/var/www/html/storage/logs/telebot.log
stopwaitsecs=3600

```

In case you want to run one particular handler for an update you may use [`callHandler()`](methods.md#telebot-methods) method on the bot instance. It's not a point is it registered handler, or not.

```php
$bot->callHandler(\Somewhere\InYour\App\YourUpdateHandler::class, $update);
```

