<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a menu button, which opens the bot's list of commands.
 * @property-read string $type Type of the button, must be commands
 *
 * @see https://core.telegram.org/bots/api#menubuttoncommands
 */
class MenuButtonCommands extends TelegramObject
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
