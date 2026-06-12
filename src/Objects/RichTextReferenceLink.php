<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A link to a reference.
 * @property-read string $type Type of the rich text, always “reference_link”
 * @property-read string|RichText[]|RichText $text The link text
 * @property-read string $reference_name The name of the reference
 *
 * @see https://core.telegram.org/bots/api#richtextreferencelink
 */
class RichTextReferenceLink extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
        public readonly string $reference_name,
    ) {
    }
}
