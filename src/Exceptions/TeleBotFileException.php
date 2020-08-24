<?php

namespace WeStacks\TeleBot\Exceptions;

use Exception;

class TeleBotFileException extends Exception
{
    public static function fileContentsIsEmpty()
    {
        return new static("The InutFile's contents is empty. Unable to upload file");
    }
}