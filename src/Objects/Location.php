<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a point on the map.
 *
 * @property float $latitude               Latitude as defined by the sender
 * @property float $longitude              Longitude as defined by the sender
 * @property float $horizontal_accuracy    Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property int   $live_period            Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
 * @property int   $heading                Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @property int   $proximity_alert_radius Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 */
class Location extends TelegramObject
{
    protected $attributes = [
        'latitude' => 'double',
        'longitude' => 'double',
        'horizontal_accuracy' => 'double',
        'live_period' => 'integer',
        'heading' => 'integer',
        'proximity_alert_radius' => 'integer',
    ];
}
