<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is filled using the selected color.
 * @property-read string $type Type of the background fill, always “solid”
 * @property-read int $color The color of the background fill in the RGB24 format
 *
 * @see https://core.telegram.org/bots/api#backgroundfillsolid
 */
class BackgroundFillSolid extends BackgroundFill
{
    public function __construct(
        public readonly string $type,
        public readonly int $color,
    ) {
    }
}
