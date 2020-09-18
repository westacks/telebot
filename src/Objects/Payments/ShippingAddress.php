<?php

namespace WeStacks\TeleBot\Objects\Payments;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a shipping address.
 *
 * @property String                    $country_code             ISO 3166-1 alpha-2 country code
 * @property String                    $state                    State, if applicable
 * @property String                    $city                     City
 * @property String                    $street_line1             First line for the address
 * @property String                    $street_line2             Second line for the address
 * @property String                    $post_code                Address post code
 *
 * @package WeStacks\TeleBot\Objects\Payments
 */
class ShippingAddress extends TelegramObject
{
    protected function relations()
    {
        return [
            'country_code'      => 'string',
            'state'             => 'string',
            'city'              => 'string',
            'street_line1'      => 'string',
            'street_line2'      => 'string',
            'post_code'         => 'string'
        ];
    }
}
