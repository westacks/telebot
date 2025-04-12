<?php

namespace WeStacks\TeleBot\Foundation;

use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\TeleBot;

use function WeStacks\TeleBot\split;

abstract class CommandHandler extends UpdateHandler
{
    /**
     * Method should return array of command aliases
     */
    abstract protected static function aliases(): array;

    /**
     * Method should return localized command description
     */
    abstract protected static function description(?string $locale = null): string;

    public function trigger(): bool
    {
        if ($this->skip() || ! isset($this->update->message()?->entities)) {
            return false;
        }

        $message = $this->update->message();

        foreach ($message->entities as $entity) {
            if (! $this->checkEntity($entity)) {
                continue;
            }

            $command = substr($message->text, $entity->offset, $entity->length);

            if (in_array($command, static::signedAliases($this->bot))) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns array of command arguments
     *
     * @return string[]|mixed
     */
    protected function arguments(?int $index = null, $default = null)
    {
        $arguments = split($this->update->message()->text);

        return is_null($index) ? $arguments : ($arguments[$index] ?? $default);
    }

    /**
     * Determines whether the current update should be skipped based on its type.
     *
     * @return bool True if the update is not of type 'message', otherwise false.
     */
    protected function skip(): bool
    {
        return ! $this->update->type('message');
    }

    /**
     * Checks if the given message entity is a bot command that starts at the beginning of a message.
     */
    protected function checkEntity(MessageEntity $entity): bool
    {
        return $entity->type === 'bot_command' && $entity->offset === 0;
    }

    protected static function signedAliases(TeleBot $bot): array
    {
        $aliases = static::aliases();

        if (! $name = $bot->config['name']) {
            return $aliases;
        }

        return array_merge(array_map(static fn ($alias) => "$alias@$name", $aliases), $aliases);
    }

    /**
     * Get bot command for each handler alias
     *
     * @return BotCommand[]
     */
    final public static function getBotCommand(?string $locale = null): array
    {
        $description = static::description($locale);

        return array_map(
            static fn (string $command) => new BotCommand($command, $description),
            static::aliases(),
        );
    }
}
