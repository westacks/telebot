<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a location to be sent.
 * @property-read string $type Type of the result, must be location
 * @property-read float $latitude Latitude of the location
 * @property-read float $longitude Longitude of the location
 * @property-read ?float $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 *
 * @see https://core.telegram.org/bots/api#inputmedialocation
 */
class InputMediaLocation extends InputPollOptionMedia
{
    public function __construct(
        public readonly string $type,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly ?float $horizontal_accuracy,
    ) {
    }
}
