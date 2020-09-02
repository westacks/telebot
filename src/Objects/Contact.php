<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents a phone contact.
 * 
 * @property String            $phone_number            Contact's phone number
 * @property String            $first_name              Contact's first name
 * @property String            $last_name               _Optional_. Contact's last name
 * @property Integer           $user_id                 _Optional_. Contact's user identifier in Telegram
 * @property String            $vcard                   _Optional_. Additional data about the contact in the form of a vCard
 * 
 * @package WeStacks\TeleBot\Objects
 */

class Contact extends TelegramObject
{
    protected function relations()
    {
        return [
            'phone_number'  => 'string',
            'first_name'    => 'string',
            'last_name'     => 'string',
            'user_id'       => 'integer',
            'vcard'         => 'string',
        ];
    }
}