<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A text with an email address.
 * @property-read string $type Type of the rich text, always “email_address”
 * @property-read RichText $text The text
 * @property-read string $email_address The email address
 *
 * @see https://core.telegram.org/bots/api#richtextemailaddress
 */
class RichTextEmailAddress extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $email_address,
    ) {
    }
}
