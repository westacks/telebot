<?php

namespace WeStacks\TeleBot\Exception;

class TeleBotRequestException extends TeleBotException
{
    public static function requestError($result)
    {
        // $parameters = ResponseParameters::create($result->parameters ?? null);
        return new TeleBotRequestException($result->description, $result->error_code);
    }
}