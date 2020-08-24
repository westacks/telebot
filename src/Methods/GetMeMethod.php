<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Objects\User;

class GetMeMethod extends Method
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/getMe",
            'send'      => [],
            'expect'    => User::class,
            'callback'  => $this->callback
        ];
    }
}