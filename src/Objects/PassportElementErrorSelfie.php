<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie changes.
 *
 * @property string $source    Error source, must be selfie
 * @property string $type      The section of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”
 * @property string $file_hash Base64-encoded hash of the file with the selfie
 * @property string $message   Error message
 */
class PassportElementErrorSelfie extends PassportElementError
{
    protected $attributes = [
        'source' => 'string',
        'type' => 'string',
        'file_hash' => 'string',
        'message' => 'string',
    ];
}
