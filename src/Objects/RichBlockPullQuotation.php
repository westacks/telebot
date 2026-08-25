<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A quotation with centered text, loosely corresponding to the HTML tag <aside>.
 * @property-read string $type Type of the block, always “pullquote”
 * @property-read RichText $text Text of the block
 * @property-read ?RichText $credit Optional. Credit of the block
 *
 * @see https://core.telegram.org/bots/api#richblockpullquotation
 */
class RichBlockPullQuotation extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly ?RichText $credit,
    ) {
    }
}
