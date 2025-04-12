<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a boost removed from a chat.
 * @property-read Chat $chat Chat which was boosted
 * @property-read string $boost_id Unique identifier of the boost
 * @property-read int $remove_date Point in time (Unix timestamp) when the boost was removed
 * @property-read ChatBoostSource $source Source of the removed boost
 *
 * @see https://core.telegram.org/bots/api#chatboostremoved
 */
class ChatBoostRemoved extends TelegramObject
{
    public function __construct(
        public readonly Chat $chat,
        public readonly string $boost_id,
        public readonly int $remove_date,
        public readonly ChatBoostSource $source,
    ) {
    }
}
