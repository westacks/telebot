<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A divider, corresponding to the HTML tag <hr/>.
 * @property-read string $type Type of the block, always “divider”
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdivider
 */
class InputRichBlockDivider extends TelegramObject
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
