<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A superscript text.
 * @property-read string $type Type of the rich text, always “superscript”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextsuperscript
 */
class RichTextSuperscript extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
