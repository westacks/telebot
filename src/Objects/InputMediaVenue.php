<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a venue to be sent.
 * @property-read string $type Type of the result, must be venue
 * @property-read float $latitude Latitude of the location
 * @property-read float $longitude Longitude of the location
 * @property-read string $title Name of the venue
 * @property-read string $address Address of the venue
 * @property-read ?string $foursquare_id Optional. Foursquare identifier of the venue
 * @property-read ?string $foursquare_type Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property-read ?string $google_place_id Optional. Google Places identifier of the venue
 * @property-read ?string $google_place_type Optional. Google Places type of the venue. (See supported types.)
 *
 * @see https://core.telegram.org/bots/api#inputmediavenue
 */
class InputMediaVenue extends InputPollOptionMedia
{
    public function __construct(
        public readonly string $type,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $title,
        public readonly string $address,
        public readonly ?string $foursquare_id,
        public readonly ?string $foursquare_type,
        public readonly ?string $google_place_id,
        public readonly ?string $google_place_type,
    ) {
    }
}
