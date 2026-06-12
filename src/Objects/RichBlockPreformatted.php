<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A preformatted text block, corresponding to the nested HTML tags <pre> and <code>.
 * @property-read string $type Type of the block, always “pre”
 * @property-read string|RichText[]|RichText $text Text of the block
 * @property-read ?string $language Optional. The programming language of the text
 *
 * @see https://core.telegram.org/bots/api#richblockpreformatted
 */
class RichBlockPreformatted extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
        public readonly ?string $language,
    ) {
    }
}
