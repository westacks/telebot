<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A block containing a list of buttons that are shown in one row, corresponding to the custom HTML tag <tg-button-row>.
 * @property-read string $type Type of the block, always “buttons”
 * @property-read RichMessageButton[] $buttons The buttons
 * @property-read ?string $align Optional. Horizontal alignment of the buttons. Currently, must be one of “left”, “center”, or “right”.
 *
 * @see https://core.telegram.org/bots/api#richblockbuttons
 */
class RichBlockButtons extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly array $buttons,
        public readonly ?string $align,
    ) {
    }
}
