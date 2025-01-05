<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Contains information about the location of a Telegram Business account.
 *
 * @property string   $address  Address of the business
 * @property Location $location Optional. Location of the business
 */
class BusinessLocation extends ReactionType
{
    protected $attributes = [
        'address' => 'string',
        'location' => 'Location',
    ];
}
