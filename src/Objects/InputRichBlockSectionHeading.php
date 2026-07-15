<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A section heading, corresponding to the HTML tags <h1>, <h2>, <h3>, <h4>, <h5>, or <h6>.
 * @property-read string $type Type of the block, always “heading”
 * @property-read RichText $text Text of the block
 * @property-read int $size Relative size of the text font; 1-6, 1 is the largest, 6 is the smallest
 *
 * @see https://core.telegram.org/bots/api#inputrichblocksectionheading
 */
class InputRichBlockSectionHeading extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly int $size,
    ) {
    }
}
