<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the position of a rectangle area on a story media or a TON wallet card.
 * @property-read float $x_percentage The abscissa of the area's center, as a percentage of the media or the card width
 * @property-read float $y_percentage The ordinate of the area's center, as a percentage of the media or the card height
 * @property-read float $width_percentage The width of the area's rectangle, as a percentage of the media or the card width
 * @property-read float $height_percentage The height of the area's rectangle, as a percentage of the media or the card height
 * @property-read float $rotation_angle The clockwise rotation angle of the rectangle, in degrees; 0-360
 * @property-read float $corner_radius_percentage The radius of the rectangle corner rounding, as a percentage of the media or the card width
 *
 * @see https://core.telegram.org/bots/api#areaposition
 */
class AreaPosition extends TelegramObject
{
    public function __construct(
        public readonly float $x_percentage,
        public readonly float $y_percentage,
        public readonly float $width_percentage,
        public readonly float $height_percentage,
        public readonly float $rotation_angle,
        public readonly float $corner_radius_percentage,
    ) {
    }
}
