<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A text with a phone number.
 * @property-read string $type Type of the rich text, always “phone_number”
 * @property-read RichText $text The text
 * @property-read string $phone_number The phone number
 *
 * @see https://core.telegram.org/bots/api#richtextphonenumber
 */
class RichTextPhoneNumber extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $phone_number,
    ) {
    }
}
