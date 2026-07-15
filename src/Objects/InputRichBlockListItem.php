<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * An item of a list to be sent.
 * @property-read InputRichBlock[] $blocks The content of the item
 * @property-read ?true $has_checkbox Optional. Pass True if the item has a checkbox
 * @property-read ?true $is_checked Optional. Pass True if the item has a checked checkbox
 * @property-read ?int $value Optional. For ordered lists, the numeric value of the item label
 * @property-read ?string $type Optional. For ordered lists, the type of the item label; must be one of “a” for lowercase letters, “A” for uppercase letters, “i” for lowercase Roman numerals, “I” for uppercase Roman numerals, or “1” for decimal numbers
 *
 * @see https://core.telegram.org/bots/api#inputrichblocklistitem
 */
class InputRichBlockListItem extends TelegramObject
{
    public function __construct(
        public readonly array $blocks,
        public readonly ?true $has_checkbox,
        public readonly ?true $is_checked,
        public readonly ?int $value,
        public readonly ?string $type,
    ) {
    }
}
