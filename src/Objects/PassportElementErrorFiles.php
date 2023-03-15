<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans changes.
 *
 * @property string   $source      Error source, must be files
 * @property string   $type        The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property string[] $file_hashes List of base64-encoded file hashes
 * @property string   $message     Error message
 */
class PassportElementErrorFiles extends PassportElementError
{
    protected $attributes = [
        'source' => 'string',
        'type' => 'string',
        'file_hashes' => 'string[]',
        'message' => 'string',
    ];
}
