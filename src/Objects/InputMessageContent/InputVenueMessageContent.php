<?php

namespace WeStacks\TeleBot\Objects\InputMessageContent;

use WeStacks\TeleBot\Objects\InputMessageContent;

/**
 * Represents the content of a venue message to be sent as the result of an inline query.
 *
 * @property float  $latitude               Latitude of the venue in degrees
 * @property float  $longitude              Longitude of the venue in degrees
 * @property string $title                  Name of the venue
 * @property string $address                Address of the venue
 * @property string $foursquare_id          _Optional_. Foursquare identifier of the venue, if known
 * @property string $foursquare_type        _Optional_. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property string $google_place_id        _Optional_. Google Places identifier of the venue
 * @property string $google_place_type      _Optional_. Google Places type of the venue
 */
class InputVenueMessageContent extends InputMessageContent
{
    protected function relations()
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'title' => 'string',
            'address' => 'string',
            'foursquare_id' => 'string',
            'foursquare_type' => 'string',
            'google_place_id' => 'string',
            'google_place_type' => 'string',
        ];
    }
}
