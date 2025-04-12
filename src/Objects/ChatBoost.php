<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about a chat boost.
 * @property-read string $boost_id Unique identifier of the boost
 * @property-read int $add_date Point in time (Unix timestamp) when the chat was boosted
 * @property-read int $expiration_date Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium subscription is prolonged
 * @property-read ChatBoostSource $source Source of the added boost
 *
 * @see https://core.telegram.org/bots/api#chatboost
 */
class ChatBoost extends TelegramObject
{
    public function __construct(
        public readonly string $boost_id,
        public readonly int $add_date,
        public readonly int $expiration_date,
        public readonly ChatBoostSource $source,
    ) {
    }
}
