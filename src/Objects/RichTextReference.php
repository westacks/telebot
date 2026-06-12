<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A reference.
 * @property-read string $type Type of the rich text, always “reference”
 * @property-read RichText $text Text of the reference
 * @property-read string $name The name of the reference
 *
 * @see https://core.telegram.org/bots/api#richtextreference
 */
class RichTextReference extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $name,
    ) {
    }
}
