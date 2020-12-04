<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommand;

class GetMyCommandsMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/getMyCommands",
            'send' => [],
            'expect' => [BotCommand::class],
        ];
    }
}
