<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a location message to be sent as the result of an inline query.
 *
 * @property float $latitude               Latitude of the location in degrees
 * @property float $longitude              Longitude of the location in degrees
 * @property float $horizontal_accuracy    Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property int   $live_period            Optional. Period in seconds during which the location can be updated, should be between 60 and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
 * @property int   $heading                Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property int   $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 */
class InputLocationMessageContent extends InputMessageContent
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
