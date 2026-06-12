<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A marked text.
 * @property-read string $type Type of the rich text, always “marked”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextmarked
 */
class RichTextMarked extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
