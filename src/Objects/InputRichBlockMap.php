<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a map, corresponding to the custom HTML tag <tg-map>. The map's width and height must not exceed 10000 in total. The width and height ratio must be at most 20.
 * @property-read string $type Type of the block, always “map”
 * @property-read Location $location Location of the center of the map
 * @property-read ?int $zoom Optional. Map zoom level; 0-24
 * @property-read ?int $width Optional. Map width; 0-10000
 * @property-read ?int $height Optional. Map height; 0-10000
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockmap
 */
class InputRichBlockMap extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly Location $location,
        public readonly ?int $zoom,
        public readonly ?int $width,
        public readonly ?int $height,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
