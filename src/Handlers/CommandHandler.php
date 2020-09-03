<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;

/**
 * Abstract class for creating Telegram command handlers
 * @package WeStacks\TeleBot\Handlers
 */
abstract class CommandHandler extends UpdateHandler
{
    /**
     * Bot command to trigger handler
     * @var string|null
     */
    protected static $command = null;

    /**
     * Command aliases
     * @var string[]
     */
    protected static $aliases = [];
    
    /**
     * Command description
     * @var string|null
     */
    protected static $description = null;

    /**
     * Command help message
     * @var string|null
     */
    protected static $help = null;

    /**
     * Get array with command's `name`, `aliases`, `description` and `help` message
     * @return array
     */
    public static function getComandData()
    {
        return [
            'name' => static::$command,
            'aliases' => static::$aliases,
            'description' => static::$description,
            'help' => static::$help
        ];
    }

    public static function trigger(Update $update)
    {
        if (!$message = $update->message) return false;
        if (!$entities = $message->entities) return false;

        foreach ($entities as $entity)
        {
            if ($entity->type != 'bot_command') continue;
            $aliases = array_merge(static::$aliases, [static::$command]);

            $command = substr($message->text, $entity->offset, $entity->length);
            if (in_array($command, $aliases)) return true;
        }

        return false;
    }
}
