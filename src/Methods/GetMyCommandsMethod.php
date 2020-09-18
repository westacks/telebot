<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommand;

class GetMyCommandsMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/getMyCommands",
            'send'      => [],
            'expect'    => array(BotCommand::class)
        ];
    }
}
