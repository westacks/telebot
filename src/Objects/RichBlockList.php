<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A list of blocks, corresponding to the HTML tag <ul> or <ol> with multiple nested tags <li>.
 * @property-read string $type Type of the block, always “list”
 * @property-read RichBlockListItem[] $items Items of the list
 *
 * @see https://core.telegram.org/bots/api#richblocklist
 */
class RichBlockList extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly array $items,
    ) {
    }
}
