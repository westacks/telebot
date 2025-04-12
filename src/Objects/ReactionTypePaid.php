<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The reaction is paid.
 * @property-read string $type Type of the reaction, always “paid”
 *
 * @see https://core.telegram.org/bots/api#reactiontypepaid
 */
class ReactionTypePaid extends ReactionType
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
