<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A bold text.
 * @property-read string $type Type of the rich text, always “bold”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextbold
 */
class RichTextBold extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
