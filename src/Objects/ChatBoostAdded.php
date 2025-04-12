<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about a user boosting a chat.
 * @property-read int $boost_count Number of boosts added by the user
 *
 * @see https://core.telegram.org/bots/api#chatboostadded
 */
class ChatBoostAdded extends TelegramObject
{
    public function __construct(
        public readonly int $boost_count,
    ) {
    }
}
