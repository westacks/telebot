<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a phone contact.
 *
 * @property string $phone_number Contact's phone number
 * @property string $first_name   Contact's first name
 * @property string $last_name    _Optional_. Contact's last name
 * @property int    $user_id      _Optional_. Contact's user identifier in Telegram
 * @property string $vcard        _Optional_. Additional data about the contact in the form of a vCard
 */
class Contact extends TelegramObject
{
    protected function relations()
    {
        return [
            'phone_number' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'user_id' => 'integer',
            'vcard' => 'string',
        ];
    }
}
