<?php

namespace WeStacks\TeleBot\Exception;

class TeleBotFileException extends TeleBotException
{
    public static function fileCantBeNull()
    {
        return new TeleBotFileException("File can't be 'NULL'!", 404);
    }
}
