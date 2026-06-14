<?php

namespace WeStacks\TeleBot\Objects;

/**
 * An italicized text.
 * @property-read string $type Type of the rich text, always “italic”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextitalic
 */
class RichTextItalic extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
