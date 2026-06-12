<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A text with an email address.
 * @property-read string $type Type of the rich text, always “email_address”
 * @property-read string|RichText[]|RichText $text The text
 * @property-read string $email_address The email address
 *
 * @see https://core.telegram.org/bots/api#richtextemailaddress
 */
class RichTextEmailAddress extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
        public readonly string $email_address,
    ) {
    }
}
