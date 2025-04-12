<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the bot's name.
 * @property-read string $name The bot's name
 *
 * @see https://core.telegram.org/bots/api#botname
 */
class BotName extends TelegramObject
{
    public function __construct(
        public readonly string $name,
    ) {
    }
}
