<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Cell in a table.
 * @property-read ?RichText $text Optional. Text in the cell. If omitted, then the cell is invisible.
 * @property-read ?true $is_header Optional. True, if the cell is a header cell
 * @property-read ?int $colspan Optional. The number of columns the cell spans if it is bigger than 1
 * @property-read ?int $rowspan Optional. The number of rows the cell spans if it is bigger than 1
 * @property-read string $align Horizontal cell content alignment. Currently, must be one of “left”, “center”, or “right”.
 * @property-read string $valign Vertical cell content alignment. Currently, must be one of “top”, “middle”, or “bottom”.
 *
 * @see https://core.telegram.org/bots/api#richblocktablecell
 */
class RichBlockTableCell extends TelegramObject
{
    public function __construct(
        public readonly ?RichText $text,
        public readonly ?true $is_header,
        public readonly ?int $colspan,
        public readonly ?int $rowspan,
        public readonly string $align,
        public readonly string $valign,
    ) {
    }
}
