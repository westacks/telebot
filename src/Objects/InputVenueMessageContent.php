<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a venue message to be sent as the result of an inline query.
 *
 * @property float  $latitude          Latitude of the venue in degrees
 * @property float  $longitude         Longitude of the venue in degrees
 * @property string $title             Name of the venue
 * @property string $address           Address of the venue
 * @property string $foursquare_id     Optional. Foursquare identifier of the venue, if known
 * @property string $foursquare_type   Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property string $google_place_id   Optional. Google Places identifier of the venue
 * @property string $google_place_type Optional. Google Places type of the venue. (See [supported types](https://developers.google.com/places/web-service/supported_types).)
 */
class InputVenueMessageContent extends InputMessageContent
{
    protected $attributes = [
        'latitude' => 'double',
        'longitude' => 'double',
        'title' => 'string',
        'address' => 'string',
        'foursquare_id' => 'string',
        'foursquare_type' => 'string',
        'google_place_id' => 'string',
        'google_place_type' => 'string',
    ];
}
