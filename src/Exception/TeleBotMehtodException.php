<?php

namespace WeStacks\TeleBot\Exception;

class TeleBotMehtodException extends TeleBotException
{
    public static function methodNotFound(string $method)
    {
        return new TeleBotMehtodException("Method \"$method\" is not exists", 404);
    }
}