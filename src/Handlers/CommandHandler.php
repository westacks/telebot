<?php

use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;

abstract class CommandHandler extends UpdateHandler
{
    protected static $command;

    public static function trigger(Update $update)
    {
        if(!$message = $update->message) return false;
        if(!$entities = $message->entities) return false;

        foreach ($entities as $entitie)
        {
            if($entitie->type != 'bot_command') continue;

            $command = substr($message->text, $entitie->offset, $entitie->length);
            // TODO: validate command
        }
    }
}
