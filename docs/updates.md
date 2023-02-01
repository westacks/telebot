## Creating handlers

When the bot receives an update, the library kernel will pass it through pipline of registered handlers. All handlers should have check if they need to handle the update and then possibly stop handling proccess if this necessary.

The library supports 2 ways to handle updates:


<!-- tabs:start -->
#### ** Using Closure **

It is recommended to use closures when handler task is small, so it will not turn your project in total mess:

```php
$handler = function(TeleBot $bot, Update $update, $next) {
    if ($update->message->text === '/start') {
        return $bot->sendMessage([
            'chat_id' => $update->chat()->id,
            'text' => 'Hello, World!'
        ]);
    }

    return $next();
};
```
#### ** Using UpdateHandler **

It is recommended to use `UpdateHandler`, when you know that given task will be quite complex. You need to describe 2 methods for each handler you create:

- `public trigger(): bool`

    Determines if this handler should handle incoming update (true - should, false - should not).


- `public handle()`

    Your handler function

If you fire [bot method](methods#telebot-methods) on `UpdateHandler` instance, the default values for parameters: `chat_id`, `user_id`, `message_id`, `callback_query_id`, `inline_message_id`, `inline_query_id`, `shipping_query_id`, `pre_checkout_query_id` - will be taken from incoming `Update` object. You still may override them pathing them to array of parameters.

If function end up having non-void return value, handling proccess will be stopped and it will be returned to the caller. In case update need to be proccessed by some other handler, you should left this function without return value.

##### Example handler:

```php
// YourUpdateHandler.php

<?php

namespace Somewhere\InYour\App;

use WeStacks\TeleBot\Handlers\UpdateHandler;
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
        return $this->sendMessage([
            'text' => 'Hello, World!'
        ]);
    }
}
```

<!-- tabs:end -->
## Registering handlers

As you created your handler, you should register it in the bot instance. Bot will automatically execute all handlers in order of registration on any incoming update.

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

## Requesting user input

Library have inbuilt state machine to handle user input. It is possible to request user input by creating `RequestInputHandler`.

<!-- tabs:start -->

#### ** Creating handler **

```php
<?php

namespace Somewhere\InYour\App;

use WeStacks\TeleBot\Handlers\RequestInputHandler;

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

        $this->acceptInput();
        $name = $validator->validated()['text'];

        return $this->sendMessage([
            'text' => "Hello, $name!",
        ]);
    }
}
```
#### ** Requesting user input **

```php

$handler = function ($bot, $update, $next) {
    if ('/test' !== $update->message()->text ?? null) {
        return $next();
    }

    AskNameHandler::requestInput($bot, $update->user()->id);

    return $bot->sendMessage([
        'chat_id' => $update->chat()->id,
        'text' => 'Please, type your name.',
    ]);
},

```

<!-- tabs:end -->
## Bot commands

The library proviedes an `UpdateHandler` specially for bot commands, so you could work with them more efficiently. All `CommandHandler` classes should be registered to be avaliable for the `setLocalCommands()` method which is handy for registering all bot commands for your bot.

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
        return $this->sendMessage([
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
$bot->setLocalCommands();

// Removing all commands from Telegram API
$bot->deleteLocalCommands();
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

You may run start handling proccess using `handleUpdate()` method

<!-- tabs:start -->

#### ** Handling updates from webhook**

##### Standalone:

```php
// Register webhook route
$bot->setWebhook([
    'url' => 'https://example.com/webhook.php'
])

// To handle update from webhook, run `handleUpdate`
$bot->handleUpdate(
    new Update(file_get_contents('php://input'))
);
```

##### Laravel:

Library automatically creates a route for handling your webhook. You need only register it:

```bash
## Register webhook route
php artisan telebot:webhook --setup
```

#### ** Handling updates using long polling**

Long polling is not that optimal solution as a webhook and works much slower. But it's really usefull for local development if you don't want to deploy your bot each time to test your whole application.
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

## Customizing proccess

There is quite chance that you may want your handlers to depend on the state or your application and not be same every request. Or attach commands scopes to your handlers. Or want to extend handling proccess with some custom logic. This is possible by oweriding `Kernel` class.

```php
<?php

namespace Somewhere\InYour\App;

use WeStacks\TeleBot\Kernel as TeleBotKernel;
use WeStacks\TeleBot\TeleBot;

class Kernel extends TeleBotKernel
{
    protected $handlers = [
        \Somewhere\InYour\App\YourUpdateHandler::class,
    ];

    public function __construct(array $handlers = [])
    {
        // Modify your handlers here or declare directly on the class
    }

    public function setCommands(TeleBot &$bot)
    {
        // Set bot commands for any scope you want

        return $bot->setMyCommands([
            'commands' => $this->getLocalCommands(),
            'scope' => 'default'
        ]);
    }

    public function deleteCommands(TeleBot &$bot)
    {
        // Delete bot commands for any scope you want

        return $bot->deleteMyCommands([
            'scope' => 'default'
        ]);
    }
}
```

When you're done, you can easily use your custom kernel in your bot instance:
```php
// Adding handlers on initialization
$bot = new TeleBot([
    'token' => '<your bot token>',
    'handlers' => \Somewhere\InYour\App\Kernel::class
]);
```
