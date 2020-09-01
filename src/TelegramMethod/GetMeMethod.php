<?php

namespace WeStacks\TeleBot\TelegramMethod;

use WeStacks\TeleBot\TelegramObject\User;
use WeStacks\TeleBot\TelegramMethod;

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