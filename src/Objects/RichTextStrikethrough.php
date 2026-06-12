<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A strikethrough text.
 * @property-read string $type Type of the rich text, always “strikethrough”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextstrikethrough
 */
class RichTextStrikethrough extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
