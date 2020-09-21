<?php

namespace WeStacks\TeleBot\Objects\InputMessageContent;

use WeStacks\TeleBot\Objects\InputMessageContent;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 *
 * @property string $phone_number Contact's phone number
 * @property string $first_name   Contact's first name
 * @property string $last_name    _Optional_. Contact's last name
 * @property string $vcard        _Optional_. Additional data about the contact in the form of a vCard, 0-2048 bytes
 */
class InputContactMessageContent extends InputMessageContent
{
    protected function relations()
    {
        return [
            'phone_number' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'vcard' => 'string',
        ];
    }
}
