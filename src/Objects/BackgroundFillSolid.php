<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is filled using the selected color.
 *
 * @property string $type  Type of the background fill, always “solid”
 * @property int    $color The color of the background fill in the RGB24 format
 */
class BackgroundFillSolid extends BackgroundFill
{
    protected $attributes = [
        'type' => 'string',
        'color' => 'integer',
    ];
}
