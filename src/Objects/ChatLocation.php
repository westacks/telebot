<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Represents a location to which a chat is connected.
 *
 * @property Location $location The location to which the supergroup is connected. Can't be a live location.
 * @property string   $address  Location address; 1-64 characters, as defined by the chat owner
 */
class ChatLocation extends TelegramObject
{
    protected $attributes = [
        'location' => 'Location',
        'address' => 'string',
    ];
}
