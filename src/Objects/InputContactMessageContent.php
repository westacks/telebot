<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a contact message to be sent as the result of an inline query.
 *
 * @property string $phone_number Contact's phone number
 * @property string $first_name   Contact's first name
 * @property string $last_name    Optional. Contact's last name
 * @property string $vcard        Optional. Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard), 0-2048 bytes
 */
class InputContactMessageContent extends InputMessageContent
{
    protected $attributes = [
        'phone_number' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'vcard' => 'string',
    ];
}
