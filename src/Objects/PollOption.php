<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about one answer option in a poll.
 * @property-read string $text Option text, 1-100 characters
 * @property-read ?MessageEntity[] $text_entities Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
 * @property-read int $voter_count Number of users that voted for this option
 *
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOption extends TelegramObject
{
    public function __construct(
        public readonly string $text,
        public readonly ?array $text_entities,
        public readonly int $voter_count,
    ) {
    }
}
