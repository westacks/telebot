<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is a freeform gradient that rotates after every message in the chat.
 *
 * @property string $type   Type of the background fill, always “freeform_gradient”
 * @property int[]  $colors A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
 */
class BackgroundFillFreeformGradient extends BackgroundFill
{
    protected $attributes = [
        'type' => 'string',
        'colors' => 'integer[]',
    ];
}
