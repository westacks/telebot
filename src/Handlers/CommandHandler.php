<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

/**
 * Abstract class for creating Telegram command handlers.
 */
abstract class CommandHandler extends UpdateHandler
{
    /**
     * Command aliases.
     *
     * @var string[]
     */
    protected static $aliases = [];

    /**
     * Command descriptioin.
     *
     * @var string
     */
    protected static $description = null;

    /**
     * Get BotCommand foreach command `aliases` and `description`.
     *
     * @return Array<BotCommand>
     */
    public static function getBotCommand()
    {
        $data = [];

        foreach (static::$aliases as $name) {
            $data[] = new BotCommand([
                'command' => $name,
                'description' => static::$description,
            ]);
        }

        return $data;
    }

    public static function trigger(Update $update, TeleBot $bot)
    {
        if (!isset($update->message) || !isset($update->message->entities)) {
            return false;
        }

        foreach ($update->message->entities as $entity) {
            if ('bot_command' != $entity->type) {
                continue;
            }

            $command = substr($update->message->text, $entity->offset, $entity->length);

            if (in_array($command, static::getSignedAliases($bot))) {
                return true;
            }
        }

        return false;
    }

    private static function getSignedAliases(TeleBot $bot): array
    {
        if (!$name = $bot->getConfig()['name']) {
            return static::$aliases;
        }

        return array_merge(array_map(function ($alias) use ($name) {
            return "$alias@$name";
        }, static::$aliases), static::$aliases);
    }
}
