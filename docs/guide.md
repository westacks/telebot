## Examples / Guide

### Further Laravel Setup Help
---
To begin receiving updates from the telegram server, after setting your *webhook* by using the `php artisan telebot:webhook -S` command - (which must be done after setting the details in either your `TeleBot.php` config file or your `.env` file.) 

You need to add a route in your `routes/web.php` file, that matches the webhook_url you set in your `.env` &/or config file.

Here is an example:
```
//routes/web.php

Route::post('/webhook', [WebhookController::class, 'webhook']);
...
```

Next you need to create a Controller so that when telegram "posts" data to your `/webhook` url it is handled by the `WebhookController::class` in this instance.

### Creating a controller using laravels built-in artisan command. 

From the terminal, type
`php artisan make:controller WebhookController`, where "`WebhookController`" is the name you want to give to your Controller.

```
<?php
//app/Http/Controllers/WebhookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WeStacks\TeleBot\Laravel\TeleBot as Bot;

class WebhookController extends Controller
{
        public function webhook()
        {
                $update = TeleBot::bot('bot')->handleUpdate();
        }

}
```

### Adding the example StartCommand

Add the following code wherever you want to store your commands, just be sure to correctly set the namespace (Capitalise first letters of all directories in namespace!)

This example stores commands inside the `app` directory, creating a new `Telegram` directory and a `Commands` directory inside that to store the commands.

```
<?php
// app/Telegram/Commands/StartCommand.php

namespace App\Telegram\Commands;

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
        /**
         *  If you fire bot method on UpdateHandler instance, the default values for parameters: 'chat_id', 'user_id',
         *  'message_id', 'callback_query_id', 'inline_message_id', 'inline_query_id', 'shipping_query_id',
         *  'pre_checkout_query_id' - will be taken from incoming Update object. You still may override them pathing them
         *  to array of parameters:
         */

        $this->sendMessage([
            'text' => 'Hello, World!'
        ]);
    }
}

```