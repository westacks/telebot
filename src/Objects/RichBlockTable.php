<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A table, corresponding to the HTML tag <table>.
 * @property-read string $type Type of the block, always “table”
 * @property-read RichBlockTableCell[][] $cells Cells of the table
 * @property-read ?true $is_bordered Optional. True, if the table has borders
 * @property-read ?true $is_striped Optional. True, if the table is striped
 * @property-read null|string|RichText[]|RichText $caption Optional. Caption of the table
 *
 * @see https://core.telegram.org/bots/api#richblocktable
 */
class RichBlockTable extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly array $cells,
        public readonly ?true $is_bordered,
        public readonly ?true $is_striped,
        public readonly null|string|array|RichText $caption,
    ) {
    }
}
