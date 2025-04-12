<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is automatically filled based on the selected colors.
 * @property-read string $type Type of the background, always “fill”
 * @property-read BackgroundFill $fill The background fill
 * @property-read int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
 *
 * @see https://core.telegram.org/bots/api#backgroundtypefill
 */
class BackgroundTypeFill extends BackgroundType
{
    public function __construct(
        public readonly string $type,
        public readonly BackgroundFill $fill,
        public readonly int $dark_theme_dimming,
    ) {
    }
}
