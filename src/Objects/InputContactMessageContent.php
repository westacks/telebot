<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 * @property-read string $phone_number Contact's phone number
 * @property-read string $first_name Contact's first name
 * @property-read ?string $last_name Optional. Contact's last name
 * @property-read ?string $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 *
 * @see https://core.telegram.org/bots/api#inputcontactmessagecontent
 */
class InputContactMessageContent extends InputMessageContent
{
    public function __construct(
        public readonly string $phone_number,
        public readonly string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $vcard,
    ) {
    }
}
