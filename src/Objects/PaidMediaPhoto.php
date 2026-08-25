<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * The paid media is a photo.
 * @property-read string $type Type of the paid media, always “photo”
 * @property-read PhotoSize[] $photo The photo
 *
 * @see https://core.telegram.org/bots/api#paidmediaphoto
 */
class PaidMediaPhoto extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly array $photo,
    ) {
    }
}
