<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the bot's short description.
 * @property-read string $short_description The bot's short description
 *
 * @see https://core.telegram.org/bots/api#botshortdescription
 */
class BotShortDescription extends TelegramObject
{
    public function __construct(
        public readonly string $short_description,
    ) {
    }
}
