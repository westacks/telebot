<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 * @property-read string $source Source of the boost, always “gift_code”
 * @property-read User $user User for which the gift code was created
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiftcode
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
{
    public function __construct(
        public readonly string $source,
        public readonly User $user,
    ) {
    }
}
