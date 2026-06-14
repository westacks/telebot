<?php

namespace WeStacks\TeleBot\Objects;

/**
 * An expandable block for details disclosure, corresponding to the HTML tag <details>.
 * @property-read string $type Type of the block, always “details”
 * @property-read RichText $summary Always shown summary of the block
 * @property-read RichBlock[] $blocks Content of the block
 * @property-read ?true $is_open Optional. True, if the content of the block is visible by default
 *
 * @see https://core.telegram.org/bots/api#richblockdetails
 */
class RichBlockDetails extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $summary,
        public readonly array $blocks,
        public readonly ?true $is_open,
    ) {
    }
}
