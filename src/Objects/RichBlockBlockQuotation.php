<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A block quotation, corresponding to the HTML tag <blockquote>.
 * @property-read string $type Type of the block, always “blockquote”
 * @property-read RichBlock[] $blocks Content of the block
 * @property-read ?RichText $credit Optional. Credit of the block
 *
 * @see https://core.telegram.org/bots/api#richblockblockquotation
 */
class RichBlockBlockQuotation extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly array $blocks,
        public readonly ?RichText $credit,
    ) {
    }
}
