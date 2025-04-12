<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 * @property-read string $source Source of the boost, always “premium”
 * @property-read User $user User that boosted the chat
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcepremium
 */
class ChatBoostSourcePremium extends ChatBoostSource
{
    public function __construct(
        public readonly string $source,
        public readonly User $user,
    ) {
    }
}
