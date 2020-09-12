<?php

namespace WeStacks\TeleBot\Objects\Passport\PassportElementError;

use WeStacks\TeleBot\Objects\Passport\PassportElementError;

/**
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans changes.
 * 
 * @property String                    $source                  Error source, must be files
 * @property String                    $type                    The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property Array<String>             $file_hashes             List of base64-encoded file hashes
 * @property String                    $message                 Error message
 * 
 * @package WeStacks\TeleBot\Objects\Passport\PassportElementError
 */
class PassportElementErrorFiles extends PassportElementError
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