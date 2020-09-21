<?php

namespace WeStacks\TeleBot\Objects\Passport\PassportElementError;

use WeStacks\TeleBot\Objects\Passport\PassportElementError;

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document translation change.
 *
 * @property string        $source      Error source, must be translation_files
 * @property string        $type        Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property Array<String> $file_hashes List of base64-encoded file hashes
 * @property string        $message     Error message
 */
class PassportElementErrorTranslationFiles extends PassportElementError
{
    protected function relations()
    {
        return [
            'source' => 'string',
            'type' => 'string',
            'file_hashes' => ['string'],
            'message' => 'string',
        ];
    }
}
