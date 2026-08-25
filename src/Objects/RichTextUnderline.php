<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * An underlined text.
 * @property-read string $type Type of the rich text, always “underline”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextunderline
 */
class RichTextUnderline extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
