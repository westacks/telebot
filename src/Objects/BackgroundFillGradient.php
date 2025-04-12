<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is a gradient fill.
 * @property-read string $type Type of the background fill, always “gradient”
 * @property-read int $top_color Top color of the gradient in the RGB24 format
 * @property-read int $bottom_color Bottom color of the gradient in the RGB24 format
 * @property-read int $rotation_angle Clockwise rotation angle of the background fill in degrees; 0-359
 *
 * @see https://core.telegram.org/bots/api#backgroundfillgradient
 */
class BackgroundFillGradient extends BackgroundFill
{
    public function __construct(
        public readonly string $type,
        public readonly int $top_color,
        public readonly int $bottom_color,
        public readonly int $rotation_angle,
    ) {
    }
}
