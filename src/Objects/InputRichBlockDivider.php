<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A divider, corresponding to the HTML tag <hr/>.
 * @property-read string $type Type of the block, always “divider”
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdivider
 */
class InputRichBlockDivider extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
