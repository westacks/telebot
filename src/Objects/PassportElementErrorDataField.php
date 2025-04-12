<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's value changes.
 * @property-read string $source Error source, must be data
 * @property-read string $type The section of the user's Telegram Passport which has the error, one of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
 * @property-read string $field_name Name of the data field which has the error
 * @property-read string $data_hash Base64-encoded data hash
 * @property-read string $message Error message
 *
 * @see https://core.telegram.org/bots/api#passportelementerrordatafield
 */
class PassportElementErrorDataField extends PassportElementError
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $field_name,
        public readonly string $data_hash,
        public readonly string $message,
    ) {
    }
}
