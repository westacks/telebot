<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a bot command.
 * @property-read string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
 * @property-read string $description Description of the command; 1-256 characters
 * @property-read ?bool $is_ephemeral Optional. True, if the command sends an ephemeral message, which can be seen only by the sender of the message and the bot
 *
 * @see https://core.telegram.org/bots/api#botcommand
 */
class BotCommand extends TelegramObject
{
    public function __construct(
        public readonly string $command,
        public readonly string $description,
        public readonly ?bool $is_ephemeral,
    ) {
    }
}
