<?php

namespace WeStacks\TeleBot\Exception;

use WeStacks\TeleBot\TelegramObject\ResponseParameters;

class TeleBotRequestException extends TeleBotException
{
    public static function requestError(object $result)
    {
        // $parameters = ResponseParameters::create($result->parameters ?? null);
        return new TeleBotRequestException($result->description, $result->error_code);
    }
}