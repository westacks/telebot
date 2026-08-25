<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A text paragraph, corresponding to the HTML tag <p>.
 * @property-read string $type Type of the block, always “paragraph”
 * @property-read RichText $text Text of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockparagraph
 */
class InputRichBlockParagraph extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
