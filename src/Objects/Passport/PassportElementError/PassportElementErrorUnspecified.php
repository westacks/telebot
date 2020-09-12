<?php

namespace WeStacks\TeleBot\Objects\Passport\PassportElementError;

use WeStacks\TeleBot\Objects\Passport\PassportElementError;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 * 
 * @property String                    $source                  Error source, must be unspecified
 * @property String                    $type                    Type of element of the user's Telegram Passport which has the issue
 * @property String                    $element_hash            Base64-encoded element hash
 * @property String                    $message                 Error message
 * 
 * @package WeStacks\TeleBot\Objects\Passport\PassportElementError
 */
class PassportElementErrorUnspecified extends PassportElementError
{
    protected function relations()
    {
        return [
            'source'            => 'string',
            'type'              => 'string',
            'element_hash'      => 'string',
            'message'           => 'string',
        ];
    }
}