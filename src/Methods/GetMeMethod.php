<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\User;

class GetMeMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "https://api.telegram.org/bot{$this->token}/getMe",
            'send' => [],
            'expect' => User::class,
        ];
    }
}
