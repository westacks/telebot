<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * The paid media is a live photo.
 * @property-read string $type Type of the paid media, always “live_photo”
 * @property-read LivePhoto $live_photo The photo
 *
 * @see https://core.telegram.org/bots/api#paidmedialivephoto
 */
class PaidMediaLivePhoto extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly LivePhoto $live_photo,
    ) {
    }
}
