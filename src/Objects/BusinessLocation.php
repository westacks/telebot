<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents the location of the business.
 *
 * @property string   $address     Address of the business
 * @property Location $location    Optional. Location of the business
 */
class BusinessLocation extends ReactionType
{
    protected $attributes = [
        'address' => 'string',
        'location' => 'Location',
    ];
}
