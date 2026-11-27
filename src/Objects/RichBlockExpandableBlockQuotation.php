<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block quotation, corresponding to the HTML tag <blockquote> with the custom attribute "expandable".
 * @property-read string $type Type of the block, always “expandable_blockquote”
 * @property-read RichBlock[] $blocks Content of the block
 * @property-read ?RichText $credit Optional. Credit of the block
 *
 * @see https://core.telegram.org/bots/api#richblockexpandableblockquotation
 */
class RichBlockExpandableBlockQuotation extends RichBlock
{
    public RichText $text;

    public function __construct(
        public readonly string $type,
        public readonly array $blocks,
        public readonly ?RichText $credit,
    ) {
    }
}
