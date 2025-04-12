<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is a freeform gradient that rotates after every message in the chat.
 * @property-read string $type Type of the background fill, always “freeform_gradient”
 * @property-read int[] $colors A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
 *
 * @see https://core.telegram.org/bots/api#backgroundfillfreeformgradient
 */
class BackgroundFillFreeformGradient extends BackgroundFill
{
    public function __construct(
        public readonly string $type,
        public readonly array $colors,
    ) {
    }
}
