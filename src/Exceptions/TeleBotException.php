<?php

namespace WeStacks\TeleBot\Exceptions;

use Exception;
use WeStacks\TeleBot\Objects\ResponseParameters;

/**
 * Basic TeleBot exception type.
 */
class TeleBotException extends Exception
{
    public static function requestError($result)
    {
        $text = $result['description'];
        if (isset($result['parameters'])) {
            $parameters = ResponseParameters::create($result['parameters'] ?? null);
            $text .= '; Parameters: '.$parameters;
        }

        return new static($text, $result['error_code']);
    }
}
