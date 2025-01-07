<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a shipping address.
 *
 * @property string $country_code Two-letter [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code
 * @property string $state        State, if applicable
 * @property string $city         City
 * @property string $street_line1 First line for the address
 * @property string $street_line2 Second line for the address
 * @property string $post_code    Address post code
 */
class ShippingAddress extends TelegramObject
{
    protected $attributes = [
        'country_code' => 'string',
        'state' => 'string',
        'city' => 'string',
        'street_line1' => 'string',
        'street_line2' => 'string',
        'post_code' => 'string',
    ];
}
