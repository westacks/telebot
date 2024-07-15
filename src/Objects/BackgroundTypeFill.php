<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is automatically filled based on the selected colors.
 *
 * @property string         $type The type of the background
 * @property BackgroundFillSolid|BackgroundFillGradient|BackgroundFillFreeformGradient $fill The background fill
 * @property int            $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
 */
class BackgroundTypeFill extends BackgroundType
{
    protected $attributes = [
        'type' => 'string',
        'fill' => 'BackgroundFill',
        'dark_theme_dimming' => 'integer',
    ];
}
