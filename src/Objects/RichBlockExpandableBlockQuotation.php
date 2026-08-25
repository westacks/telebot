<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A block quotation, corresponding to the HTML tag <blockquote> with custom attribute "collapsed".
 * @property-read string $type Type of the block, always “expandable_blockquote”
 * @property-read RichText $text Content of the block
 * @property-read ?RichText $credit Optional. Credit of the block
 *
 * @see https://core.telegram.org/bots/api#richblockexpandableblockquotation
 */
class RichBlockExpandableBlockQuotation extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly ?RichText $credit,
    ) {
    }
}
