<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A preformatted text block, corresponding to the nested HTML tags <pre> and <code>.
 * @property-read string $type Type of the block, always “pre”
 * @property-read RichText $text Text of the block
 * @property-read ?string $language Optional. The programming language of the text
 *
 * @see https://core.telegram.org/bots/api#inputrichblockpreformatted
 */
class InputRichBlockPreformatted extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly ?string $language,
    ) {
    }
}
