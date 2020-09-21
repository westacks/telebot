<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a point on the map.
 *
 * @property float $longitude Longitude as defined by sender
 * @property float $latitude  Latitude as defined by sender
 */
class Location extends TelegramObject
{
    protected function relations()
    {
        return [
            'longitude' => 'float',
            'latitude' => 'float',
        ];
    }
}
