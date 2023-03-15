<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @property string $point   The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or “chin”.
 * @property float  $x_shift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing -1.0 will place mask just to the left of the default mask position.
 * @property float  $y_shift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will place the mask just below the default mask position.
 * @property float  $scale   Mask scaling coefficient. For example, 2.0 means double size.
 */
class MaskPosition extends TelegramObject
{
    protected $attributes = [
        'point' => 'string',
        'x_shift' => 'double',
        'y_shift' => 'double',
        'scale' => 'double',
    ];
}
