<?php

namespace WeStacks\TeleBot\Exceptions;

use Exception;

class TeleBotRequestException extends Exception
{
    public static function unsuccessfulRequest(string $message, int $status)
    {
        return new static("The InutFile's contents is empty. Unable to create multipart data");
    }
}