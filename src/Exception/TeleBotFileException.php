<?php

namespace WeStacks\TeleBot\Exception;

class TeleBotFileException extends TeleBotException
{
    public static function fileContentsIsEmpty()
    {
        return new TeleBotFileException("The InutFile's contents is empty. Unable to create multipart data");
    }
}