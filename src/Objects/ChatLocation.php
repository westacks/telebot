<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * Represents a location to which a chat is connected.
 *
 * @property float $location The location to which the supergroup is connected. Can't be a live location.
 * @property float $address  Location address; 1-64 characters, as defined by the chat owner
 */
class ChatLocation extends TelegramObject
{
    protected function relations()
    {
        return [
            'location' => Location::class,
            'address' => 'string',
        ];
    }
}
