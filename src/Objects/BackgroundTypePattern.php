<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is a .PNG or .TGV (gzipped subset of SVG with MIME type “application/x-tgwallpattern”) pattern to be combined with the background fill chosen by the user.
 * @property-read string $type Type of the background, always “pattern”
 * @property-read Document $document Document with the pattern
 * @property-read BackgroundFill $fill The background fill that is combined with the pattern
 * @property-read int $intensity Intensity of the pattern when it is shown above the filled background; 0-100
 * @property-read ?true $is_inverted Optional. True, if the background fill must be applied only to the pattern itself. All other pixels are black in this case. For dark themes only
 * @property-read ?true $is_moving Optional. True, if the background moves slightly when the device is tilted
 *
 * @see https://core.telegram.org/bots/api#backgroundtypepattern
 */
class BackgroundTypePattern extends BackgroundType
{
    public function __construct(
        public readonly string $type,
        public readonly Document $document,
        public readonly BackgroundFill $fill,
        public readonly int $intensity,
        public readonly ?true $is_inverted,
        public readonly ?true $is_moving,
    ) {
    }
}
