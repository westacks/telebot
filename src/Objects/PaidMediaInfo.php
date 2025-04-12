<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the paid media added to a message.
 * @property-read int $star_count The number of Telegram Stars that must be paid to buy access to the media
 * @property-read PaidMedia[] $paid_media Information about the paid media
 *
 * @see https://core.telegram.org/bots/api#paidmediainfo
 */
class PaidMediaInfo extends TelegramObject
{
    public function __construct(
        public readonly int $star_count,
        public readonly array $paid_media,
    ) {
    }
}
