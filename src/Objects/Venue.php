<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a venue.
 * @property-read Location $location Venue location. Can't be a live location
 * @property-read string $title Name of the venue
 * @property-read string $address Address of the venue
 * @property-read ?string $foursquare_id Optional. Foursquare identifier of the venue
 * @property-read ?string $foursquare_type Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property-read ?string $google_place_id Optional. Google Places identifier of the venue
 * @property-read ?string $google_place_type Optional. Google Places type of the venue. (See supported types.)
 *
 * @see https://core.telegram.org/bots/api#venue
 */
class Venue extends TelegramObject
{
    public function __construct(
        public readonly Location $location,
        public readonly string $title,
        public readonly string $address,
        public readonly ?string $foursquare_id,
        public readonly ?string $foursquare_type,
        public readonly ?string $google_place_id,
        public readonly ?string $google_place_type,
    ) {
    }
}
