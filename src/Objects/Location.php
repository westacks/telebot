<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a point on the map.
 * 
 * @property Float    $longitude    Longitude as defined by sender
 * @property Float    $latitude     Latitude as defined by sender
 * 
 * @package WeStacks\TeleBot\Objects
 */

class Location extends TelegramObject
{
    protected function relations()
    {
        return [
            'longitude' => 'float',
            'latitude'  => 'float'
        ];
    }
}