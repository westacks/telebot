<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A subscript text.
 * @property-read string $type Type of the rich text, always “subscript”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextsubscript
 */
class RichTextSubscript extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
