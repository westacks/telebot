<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A text covered by a spoiler.
 * @property-read string $type Type of the rich text, always “spoiler”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextspoiler
 */
class RichTextSpoiler extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
