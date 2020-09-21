<?php

namespace WeStacks\TeleBot\Exception;

class TeleBotMehtodException extends TeleBotException
{
    public static function methodNotFound(string $method)
    {
        return new TeleBotMehtodException("Method \"{$method}\" is not exists", 404);
    }

    public static function wrongHandlerType(string $type)
    {
        return new TeleBotMehtodException("Given update handler type \"{$type}\" is not valid update handler", 404);
    }
}
