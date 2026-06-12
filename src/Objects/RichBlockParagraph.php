<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A text paragraph, corresponding to the HTML tag <p>.
 * @property-read string $type Type of the block, always “paragraph”
 * @property-read string|RichText[]|RichText $text Text of the block
 *
 * @see https://core.telegram.org/bots/api#richblockparagraph
 */
class RichBlockParagraph extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
    ) {
    }
}
