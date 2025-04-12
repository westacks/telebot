<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about a paid media purchase.
 * @property-read User $from User who purchased the media
 * @property-read string $paid_media_payload Bot-specified paid media payload
 *
 * @see https://core.telegram.org/bots/api#paidmediapurchased
 */
class PaidMediaPurchased extends TelegramObject
{
    public function __construct(
        public readonly User $from,
        public readonly string $paid_media_payload,
    ) {
    }
}
