<?php

namespace WeStacks\TeleBot\Objects\Passport\PassportElementError;

use WeStacks\TeleBot\Objects\Passport\PassportElementError;

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 * 
 * @property String                    $source                  Error source, must be file
 * @property String                    $type                    The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property String                    $file_hash               Base64-encoded file hash
 * @property String                    $message                 Error message
 * 
 * @package WeStacks\TeleBot\Objects\Passport\PassportElementError
 */
class PassportElementErrorFile extends PassportElementError
{
    protected function relations()
    {
        return [
            'source'            => 'string',
            'type'              => 'string',
            'file_hash'         => 'string',
            'message'           => 'string',
        ];
    }
}