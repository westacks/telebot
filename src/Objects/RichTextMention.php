<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A mention by a username.
 * @property-read string $type Type of the rich text, always “mention”
 * @property-read RichText $text The text
 * @property-read string $username The username
 *
 * @see https://core.telegram.org/bots/api#richtextmention
 */
class RichTextMention extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $username,
    ) {
    }
}
