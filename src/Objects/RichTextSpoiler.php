<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A text covered by a spoiler.
 * @property-read string $type Type of the rich text, always “spoiler”
 * @property-read string|RichText[]|RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextspoiler
 */
class RichTextSpoiler extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
    ) {
    }
}
