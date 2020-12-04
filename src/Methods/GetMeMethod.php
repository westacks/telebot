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
            'url' => "{$this->api}/bot{$this->token}/getMe",
            'send' => [],
            'expect' => User::class,
        ];
    }
}
