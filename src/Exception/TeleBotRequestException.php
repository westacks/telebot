<?php

namespace WeStacks\TeleBot\Exception;

use Exception;

class TeleBotRequestException extends Exception
{
    public static function unsuccessfulRequest(string $message, int $status)
    {
        return new TeleBotRequestException("The InutFile's contents is empty. Unable to create multipart data");
    }
}