<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A hashtag.
 * @property-read string $type Type of the rich text, always “hashtag”
 * @property-read RichText $text The text
 * @property-read string $hashtag The hashtag
 *
 * @see https://core.telegram.org/bots/api#richtexthashtag
 */
class RichTextHashtag extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $hashtag,
    ) {
    }
}
