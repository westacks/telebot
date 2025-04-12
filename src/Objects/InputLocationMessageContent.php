<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 * @property-read float $latitude Latitude of the location in degrees
 * @property-read float $longitude Longitude of the location in degrees
 * @property-read ?float $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property-read ?int $live_period Optional. Period in seconds during which the location can be updated, should be between 60 and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
 * @property-read ?int $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property-read ?int $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 *
 * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
class InputLocationMessageContent extends InputMessageContent
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly ?float $horizontal_accuracy,
        public readonly ?int $live_period,
        public readonly ?int $heading,
        public readonly ?int $proximity_alert_radius,
    ) {
    }
}
