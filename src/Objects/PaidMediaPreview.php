<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media isn't available before the payment.
 * @property-read string $type Type of the paid media, always “preview”
 * @property-read ?int $width Optional. Media width as defined by the sender
 * @property-read ?int $height Optional. Media height as defined by the sender
 * @property-read ?int $duration Optional. Duration of the media in seconds as defined by the sender
 *
 * @see https://core.telegram.org/bots/api#paidmediapreview
 */
class PaidMediaPreview extends PaidMedia
{
    public function __construct(
        public readonly string $type,
        public readonly ?int $width,
        public readonly ?int $height,
        public readonly ?int $duration,
    ) {
    }
}
