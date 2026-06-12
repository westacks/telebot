<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a map, corresponding to the custom HTML tag <tg-map>.
 * @property-read string $type Type of the block, always “map”
 * @property-read Location $location Location of the center of the map
 * @property-read int $zoom Map zoom level; 13-20
 * @property-read int $width Expected width of the map
 * @property-read int $height Expected height of the map
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockmap
 */
class RichBlockMap extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly Location $location,
        public readonly int $zoom,
        public readonly int $width,
        public readonly int $height,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
