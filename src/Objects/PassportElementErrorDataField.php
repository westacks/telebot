<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's value changes.
 *
 * @property string $source     Error source, must be data
 * @property string $type       The section of the user's Telegram Passport which has the error, one of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
 * @property string $field_name Name of the data field which has the error
 * @property string $data_hash  Base64-encoded data hash
 * @property string $message    Error message
 */
class PassportElementErrorDataField extends PassportElementError
{
    protected $attributes = [
        'source' => 'string',
        'type' => 'string',
        'field_name' => 'string',
        'data_hash' => 'string',
        'message' => 'string',
    ];
}
