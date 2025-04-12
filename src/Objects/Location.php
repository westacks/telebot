<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a point on the map.
 * @property-read float $latitude Latitude as defined by the sender
 * @property-read float $longitude Longitude as defined by the sender
 * @property-read ?float $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property-read ?int $live_period Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
 * @property-read ?int $heading Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @property-read ?int $proximity_alert_radius Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 *
 * @see https://core.telegram.org/bots/api#location
 */
class Location extends TelegramObject
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
