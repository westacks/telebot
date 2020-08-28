<?php

namespace WeStacks\TeleBot\Exception;

class TeleBotFileException extends TeleBotException
{
    public static function unableToOpenFileOrResource()
    {
        return new TeleBotFileException("Unable to read given file!");
    }
}