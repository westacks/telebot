<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a point on the map.
 *
 * @property float          $longitude                  Longitude as defined by sender
 * @property float          $latitude                   Latitude as defined by sender
 * @property float          $horizontal_accuracy        _Optional_. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property integer        $live_period                _Optional_. Time relative to the message sending date, during which the location can be updated, in seconds. For active live locations only.
 * @property integer        $heading                    _Optional_. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @property integer        $proximity_alert_radius     _Optional_. Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 */
class Location extends TelegramObject
{
    protected function relations()
    {
        return [
            'longitude' => 'float',
            'latitude' => 'float',
            'horizontal_accuracy' => 'float',
            'live_period' => 'integer',
            'heading' => 'integer',
            'proximity_alert_radius' => 'integer',
        ];
    }
}
