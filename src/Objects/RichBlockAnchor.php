<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with an anchor, corresponding to the HTML tag <a> with the attribute name.
 * @property-read string $type Type of the block, always “anchor”
 * @property-read string $name The name of the anchor
 *
 * @see https://core.telegram.org/bots/api#richblockanchor
 */
class RichBlockAnchor extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly string $name,
    ) {
    }
}
