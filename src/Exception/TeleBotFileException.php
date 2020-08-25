<?php

namespace WeStacks\TeleBot\Exception;

use Exception;

class TeleBotFileException extends Exception
{
    public static function fileContentsIsEmpty()
    {
        return new TeleBotFileException("The InutFile's contents is empty. Unable to create multipart data");
    }
}