<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the background of a gift.
 * @property-read int $center_color Center color of the background in RGB format
 * @property-read int $edge_color Edge color of the background in RGB format
 * @property-read int $text_color Text color of the background in RGB format
 *
 * @see https://core.telegram.org/bots/api#giftbackground
 */
class GiftBackground extends TelegramObject
{
    public function __construct(
        public readonly int $center_color,
        public readonly int $edge_color,
        public readonly int $text_color,
    ) {
    }
}
