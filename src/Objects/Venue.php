<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents a venue.
 * 
 * @property Location          $location            Venue location
 * @property String            $title               Name of the venue
 * @property String            $address             Address of the venue
 * @property String            $foursquare_id       _Optional_. Foursquare identifier of the venue
 * @property String            $foursquare_type     _Optional_. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * 
 * @package WeStacks\TeleBot\Objects
 */

class Venue extends TelegramObject
{
    protected function relations()
    {
        return [
            'location'              => Location::class,
            'title'                 => 'string',
            'address'               => 'string',
            'foursquare_id'         => 'string',
            'foursquare_type'       => 'string',
        ];
    }
}