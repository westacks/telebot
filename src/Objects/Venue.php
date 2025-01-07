<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a venue.
 *
 * @property Location $location          Venue location. Can't be a live location
 * @property string   $title             Name of the venue
 * @property string   $address           Address of the venue
 * @property string   $foursquare_id     Optional. Foursquare identifier of the venue
 * @property string   $foursquare_type   Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property string   $google_place_id   Optional. Google Places identifier of the venue
 * @property string   $google_place_type Optional. Google Places type of the venue. (See [supported types](https://developers.google.com/places/web-service/supported_types).)
 */
class Venue extends TelegramObject
{
    protected $attributes = [
        'location' => 'Location',
        'title' => 'string',
        'address' => 'string',
        'foursquare_id' => 'string',
        'foursquare_type' => 'string',
        'google_place_id' => 'string',
        'google_place_type' => 'string',
    ];
}
