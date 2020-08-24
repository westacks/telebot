<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Objects\User;

class GetMeMethod extends Method
{
    public static function name()
    {
        return 'getMe';
    }

    protected function request()
    {
        return [
            'type'      => 'GET',
            'send'      => [],
            'expect'    => User::class
        ];
    }
}