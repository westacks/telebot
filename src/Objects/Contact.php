<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a phone contact.
 * @property-read string $phone_number Contact's phone number
 * @property-read string $first_name Contact's first name
 * @property-read ?string $last_name Optional. Contact's last name
 * @property-read ?int $user_id Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read ?string $vcard Optional. Additional data about the contact in the form of a vCard
 *
 * @see https://core.telegram.org/bots/api#contact
 */
class Contact extends TelegramObject
{
    public function __construct(
        public readonly string $phone_number,
        public readonly string $first_name,
        public readonly ?string $last_name,
        public readonly ?int $user_id,
        public readonly ?string $vcard,
    ) {
    }
}
