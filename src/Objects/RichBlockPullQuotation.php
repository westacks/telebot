<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A quotation with centered text, loosely corresponding to the HTML tag <aside>.
 * @property-read string $type Type of the block, always “pullquote”
 * @property-read string|RichText[]|RichText $text Text of the block
 * @property-read null|string|RichText[]|RichText $credit Optional. Credit of the block
 *
 * @see https://core.telegram.org/bots/api#richblockpullquotation
 */
class RichBlockPullQuotation extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
        public readonly null|string|array|RichText $credit,
    ) {
    }
}
