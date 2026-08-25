<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * The reaction is paid.
 * @property-read string $type Type of the reaction, always “paid”
 *
 * @see https://core.telegram.org/bots/api#reactiontypepaid
 */
class ReactionTypePaid extends TelegramObject
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
