<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is a wallpaper in the JPEG format.
 *
 * @property string   $type               Type of the background, always “wallpaper”
 * @property Document $document           Document with the wallpaper
 * @property int      $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
 * @property bool     $is_blurred         Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
 * @property bool     $is_moving          Optional. True, if the background moves slightly when the device is tilted
 */
class BackgroundTypeWallpaper extends BackgroundType
{
    protected $attributes = [
        'type' => 'string',
        'document' => 'Document',
        'dark_theme_dimming' => 'integer',
        'is_blurred' => 'boolean',
        'is_moving' => 'boolean',
    ];
}
