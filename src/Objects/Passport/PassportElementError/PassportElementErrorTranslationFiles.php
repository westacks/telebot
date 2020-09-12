<?php

namespace WeStacks\TeleBot\Objects\Passport\PassportElementError;

use WeStacks\TeleBot\Objects\Passport\PassportElementError;

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document translation change.
 * 
 * @property String                    $source                  Error source, must be translation_files
 * @property String                    $type                    Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property Array<String>             $file_hashes             List of base64-encoded file hashes
 * @property String                    $message                 Error message
 * 
 * @package WeStacks\TeleBot\Objects\Passport\PassportElementError
 */
class PassportElementErrorTranslationFiles extends PassportElementError
{
    protected function relations()
    {
        return [
            'source'            => 'string',
            'type'              => 'string',
            'file_hashes'       => array('string'),
            'message'           => 'string',
        ];
    }
}