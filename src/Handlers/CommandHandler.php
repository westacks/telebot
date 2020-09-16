<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;

/**
 * Abstract class for creating Telegram command handlers
 * @package WeStacks\TeleBot\Handlers
 */
abstract class CommandHandler extends UpdateHandler
{
    /**
     * Command aliases
     * @var string[]
     */
    protected static $aliases = [];

    /**
     * Command descriptioin
     * @var string
     */
    protected static $description = null;

    /**
     * Get BotCommand foreach command `aliases` and `description`
     * @return Array<BotCommand>
     */
    public static function getBotCommand()
    {
        $data = [];
        
        foreach (static::$aliases as $name)
        {
            $data[] = new BotCommand([
                'command' => $name,
                'description' => static::$description
            ]);
        }

        return $data;
    }

    public static function trigger(Update $update)
    {
        if (!isset($update->message) || !isset($update->message->entities)) return false;

        foreach ($update->message->entities as $entity)
        {
            if ($entity->type != 'bot_command') continue;

            $command = substr($update->message->text, $entity->offset, $entity->length);
            if (in_array($command, static::$aliases)) return true;
        }

        return false;
    }
}
