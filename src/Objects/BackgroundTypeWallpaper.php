<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is a wallpaper in the JPEG format.
 * @property-read string $type Type of the background, always “wallpaper”
 * @property-read Document $document Document with the wallpaper
 * @property-read int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
 * @property-read ?true $is_blurred Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
 * @property-read ?true $is_moving Optional. True, if the background moves slightly when the device is tilted
 *
 * @see https://core.telegram.org/bots/api#backgroundtypewallpaper
 */
class BackgroundTypeWallpaper extends BackgroundType
{
    public function __construct(
        public readonly string $type,
        public readonly Document $document,
        public readonly int $dark_theme_dimming,
        public readonly ?true $is_blurred,
        public readonly ?true $is_moving,
    ) {
    }
}
