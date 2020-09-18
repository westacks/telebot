<?php

namespace WeStacks\TeleBot\Exception;

use WeStacks\TeleBot\Objects\ResponseParameters;

class TeleBotRequestException extends TeleBotException
{
    public static function requestError($result)
    {
        $text = $result->description;
        if (isset($result->parameters)) {
            $parameters = ResponseParameters::create($result->parameters ?? null);
            $text .= '; Parameters: '.$parameters;
        }

        return new TeleBotRequestException($text, $result->error_code);
    }
}
