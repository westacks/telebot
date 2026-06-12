<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A divider, corresponding to the HTML tag <hr/>.
 * @property-read string $type Type of the block, always “divider”
 *
 * @see https://core.telegram.org/bots/api#richblockdivider
 */
class RichBlockDivider extends RichBlock
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
