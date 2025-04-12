<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a reaction added to a message along with the number of times it was added.
 * @property-read ReactionType $type Type of the reaction
 * @property-read int $total_count Number of times the reaction was added
 *
 * @see https://core.telegram.org/bots/api#reactioncount
 */
class ReactionCount extends TelegramObject
{
    public function __construct(
        public readonly ReactionType $type,
        public readonly int $total_count,
    ) {
    }
}
