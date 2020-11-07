<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a venue.
 *
 * @property Location $location             Venue location
 * @property string   $title                Name of the venue
 * @property string   $address              Address of the venue
 * @property string   $foursquare_id        _Optional_. Foursquare identifier of the venue
 * @property string   $foursquare_type      _Optional_. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property string   $google_place_id      _Optional_. Google Places identifier of the venue
 * @property string   $google_place_type    _Optional_. Google Places type of the venue
 */
class Venue extends TelegramObject
{
    protected function relations()
    {
        return [
            'location' => Location::class,
            'title' => 'string',
            'address' => 'string',
            'foursquare_id' => 'string',
            'foursquare_type' => 'string',
            'google_place_id' => 'string',
            'google_place_type' => 'string',
        ];
    }
}
