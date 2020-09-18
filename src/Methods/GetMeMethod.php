<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\Interfaces\TelegramMethod;

class GetMeMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/getMe",
            'send'      => [],
            'expect'    => User::class
        ];
    }
}
