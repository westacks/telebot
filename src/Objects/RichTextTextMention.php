<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A mention of a Telegram user by their identifier.
 * @property-read string $type Type of the rich text, always “text_mention”
 * @property-read string|RichText[]|RichText $text The text
 * @property-read User $user The mentioned user
 *
 * @see https://core.telegram.org/bots/api#richtexttextmention
 */
class RichTextTextMention extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
        public readonly User $user,
    ) {
    }
}
