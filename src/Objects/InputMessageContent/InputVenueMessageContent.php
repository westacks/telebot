<?php

namespace WeStacks\TeleBot\Objects\InputMessageContent;

use WeStacks\TeleBot\Objects\InputMessageContent;

/**
 * Represents the content of a venue message to be sent as the result of an inline query.
 *
 * @property Float                    $latitude                 Latitude of the venue in degrees
 * @property Float                    $longitude                Longitude of the venue in degrees
 * @property String                   $title                    Name of the venue
 * @property String                   $address                  Address of the venue
 * @property String                   $foursquare_id            _Optional_. Foursquare identifier of the venue, if known
 * @property String                   $foursquare_type          _Optional_. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 *
 * @package WeStacks\TeleBot\Objects\InputMessageContent
 */
class InputVenueMessageContent extends InputMessageContent
{
    protected function relations()
    {
        return [
            'latitude'          => 'float',
            'longitude'         => 'float',
            'title'             => 'string',
            'address'           => 'string',
            'foursquare_id'     => 'string',
            'foursquare_type'   => 'string',
        ];
    }
}
