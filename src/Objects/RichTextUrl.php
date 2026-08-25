<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A text with a link.
 * @property-read string $type Type of the rich text, always “url”
 * @property-read RichText $text The text
 * @property-read string $url URL of the link
 *
 * @see https://core.telegram.org/bots/api#richtexturl
 */
class RichTextUrl extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $url,
    ) {
    }
}
