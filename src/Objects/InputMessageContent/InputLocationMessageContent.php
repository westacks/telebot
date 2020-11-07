<?php

namespace WeStacks\TeleBot\Objects\InputMessageContent;

use WeStacks\TeleBot\Objects\InputMessageContent;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 *
 * @property float      $latitude               Latitude of the location in degrees
 * @property float      $longitude              Longitude of the location in degrees
 * @property float      $horizontal_accuracy    _Optional_. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property integer    $live_period            _Optional_. Time relative to the message sending date, during which the location can be updated, in seconds. For active live locations only.
 * @property integer    $heading                _Optional_. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @property integer    $proximity_alert_radius _Optional_. Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 */
class InputLocationMessageContent extends InputMessageContent
{
    protected function relations()
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'horizontal_accuracy' => 'float',
            'live_period' => 'integer',
            'heading' => 'integer',
            'proximity_alert_radius' => 'integer',
        ];
    }
}
