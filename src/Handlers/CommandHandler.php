<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Objects\BotCommand;
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
     * Command description.
     *
     * @var string
     */
    protected static $description;

    /**
     * Get array of Telegram` BotCommand` objects for each command alias.
     *
     * @return BotCommand[]
     */
    final public static function getBotCommand(?string $locale = null)
    {
        $description = function_exists('trans') ? trans(static::$description, locale: $locale) : static::$description;

        return array_map(
            function (string $command) use ($description) {
                return new BotCommand(compact('command', 'description'));
            },
            static::$aliases,
        );
    }

    public function trigger()
    {
        if (! isset($this->update->message) || ! isset($this->update->message->entities)) {
            return false;
        }

        foreach ($this->update->message->entities as $entity) {
            if ($entity->type != 'bot_command') {
                continue;
            }

            $command = substr($this->update->message->text, $entity->offset, $entity->length);

            if (in_array($command, static::getSignedAliases($this->bot))) {
                return true;
            }
        }

        return false;
    }

    private static function getSignedAliases(TeleBot $bot): array
    {
        if (! $name = $bot->config('name')) {
            return static::$aliases;
        }

        return array_merge(array_map(function ($alias) use ($name) {
            return "$alias@$name";
        }, static::$aliases), static::$aliases);
    }
}
