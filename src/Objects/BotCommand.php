<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a bot command.
 * @property-read string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
 * @property-read string $description Description of the command; 1-256 characters.
 *
 * @see https://core.telegram.org/bots/api#botcommand
 */
class BotCommand extends TelegramObject
{
    public function __construct(
        public readonly string $command,
        public readonly string $description,
    ) {
    }
}
