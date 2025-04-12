<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a boost added to a chat or changed.
 * @property-read Chat $chat Chat which was boosted
 * @property-read ChatBoost $boost Information about the chat boost
 *
 * @see https://core.telegram.org/bots/api#chatboostupdated
 */
class ChatBoostUpdated extends TelegramObject
{
    public function __construct(
        public readonly Chat $chat,
        public readonly ChatBoost $boost,
    ) {
    }
}
