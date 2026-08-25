<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A link to a reference.
 * @property-read string $type Type of the rich text, always “reference_link”
 * @property-read RichText $text The link text
 * @property-read string $reference_name The name of the reference
 *
 * @see https://core.telegram.org/bots/api#richtextreferencelink
 */
class RichTextReferenceLink extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $reference_name,
    ) {
    }
}
