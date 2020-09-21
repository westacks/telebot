<?php

namespace WeStacks\TeleBot\Objects\InputMessageContent;

use WeStacks\TeleBot\Objects\InputMessageContent;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 *
 * @property float $latitude    Latitude of the location in degrees
 * @property float $longitude   Longitude of the location in degrees
 * @property int   $live_period _Optional_. Period in seconds for which the location can be updated, should be between 60 and 86400.
 */
class InputLocationMessageContent extends InputMessageContent
{
    protected function relations()
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'live_period' => 'integer',
        ];
    }
}
