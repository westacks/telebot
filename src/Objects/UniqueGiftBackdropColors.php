<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the colors of the backdrop of a unique gift.
 * @property-read int $center_color The color in the center of the backdrop in RGB format
 * @property-read int $edge_color The color on the edges of the backdrop in RGB format
 * @property-read int $symbol_color The color to be applied to the symbol in RGB format
 * @property-read int $text_color The color for the text on the backdrop in RGB format
 *
 * @see https://core.telegram.org/bots/api#uniquegiftbackdropcolors
 */
class UniqueGiftBackdropColors extends TelegramObject
{
    public function __construct(
        public readonly int $center_color,
        public readonly int $edge_color,
        public readonly int $symbol_color,
        public readonly int $text_color,
    ) {
    }
}
