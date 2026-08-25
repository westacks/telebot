<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A mention of a Telegram user by their identifier.
 * @property-read string $type Type of the rich text, always “text_mention”
 * @property-read RichText $text The text
 * @property-read User $user The mentioned user
 *
 * @see https://core.telegram.org/bots/api#richtexttextmention
 */
class RichTextTextMention extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly User $user,
    ) {
    }
}
