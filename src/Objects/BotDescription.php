<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the bot's description.
 * @property-read string $description The bot's description
 *
 * @see https://core.telegram.org/bots/api#botdescription
 */
class BotDescription extends TelegramObject
{
    public function __construct(
        public readonly string $description,
    ) {
    }
}
