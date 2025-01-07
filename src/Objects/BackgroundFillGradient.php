<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is a gradient fill.
 *
 * @property string $type           Type of the background fill, always “gradient”
 * @property int    $top_color      Top color of the gradient in the RGB24 format
 * @property int    $bottom_color   Bottom color of the gradient in the RGB24 format
 * @property int    $rotation_angle Clockwise rotation angle of the background fill in degrees; 0-359
 */
class BackgroundFillGradient extends BackgroundFill
{
    protected $attributes = [
        'type' => 'string',
        'top_color' => 'integer',
        'bottom_color' => 'integer',
        'rotation_angle' => 'integer',
    ];
}
