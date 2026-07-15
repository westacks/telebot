<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block quotation, corresponding to the HTML tag <blockquote>.
 * @property-read string $type Type of the block, always “blockquote”
 * @property-read InputRichBlock[] $blocks Content of the block
 * @property-read ?RichText $credit Optional. Credit of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockblockquotation
 */
class InputRichBlockBlockQuotation extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly array $blocks,
        public readonly ?RichText $credit,
    ) {
    }
}
