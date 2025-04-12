<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the types of gifts that can be gifted to a user or a chat.
 * @property-read bool $unlimited_gifts True, if unlimited regular gifts are accepted
 * @property-read bool $limited_gifts True, if limited regular gifts are accepted
 * @property-read bool $unique_gifts True, if unique gifts or gifts that can be upgraded to unique for free are accepted
 * @property-read bool $premium_subscription True, if a Telegram Premium subscription is accepted
 *
 * @see https://core.telegram.org/bots/api#acceptedgifttypes
 */
class AcceptedGiftTypes extends TelegramObject
{
    public function __construct(
        public readonly bool $unlimited_gifts,
        public readonly bool $limited_gifts,
        public readonly bool $unique_gifts,
        public readonly bool $premium_subscription,
    ) {
    }
}
