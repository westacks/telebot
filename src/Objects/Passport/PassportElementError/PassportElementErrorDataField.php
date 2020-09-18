<?php

namespace WeStacks\TeleBot\Objects\Passport\PassportElementError;

use WeStacks\TeleBot\Objects\Passport\PassportElementError;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's value changes.
 *
 * @property String                    $source                  Error source, must be data
 * @property String                    $type                    The section of the user's Telegram Passport which has the error, one of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
 * @property String                    $field_name              Name of the data field which has the error
 * @property String                    $data_hash               Base64-encoded data hash
 * @property String                    $message                 Error message
 *
 * @package WeStacks\TeleBot\Objects\Passport\PassportElementError
 */
class PassportElementErrorDataField extends PassportElementError
{
    protected function relations()
    {
        return [
            'source'            => 'string',
            'type'              => 'string',
            'field_name'        => 'string',
            'data_hash'         => 'string',
            'message'           => 'string',
        ];
    }
}
