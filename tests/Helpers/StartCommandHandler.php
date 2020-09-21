<?php

namespace WeStacks\TeleBot\Tests\Helpers;

use WeStacks\TeleBot\Handlers\CommandHandler;

class StartCommandHandler extends CommandHandler
{
    protected static $aliases = ['/start', '/s'];
    protected static $description = 'Send "/start" or "/s" to get "Hello, World!"';

    public function handle()
    {
        $this->bot->sendMessage([
            'chat_id' => $this->update->message->chat->id,
            'text' => 'Hello, World!',
        ]);
    }
}
