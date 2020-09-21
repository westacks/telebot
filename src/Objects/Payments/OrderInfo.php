<?php

namespace WeStacks\TeleBot\Objects\Payments;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents information about an order.
 *
 * @property string          $name             _Optional_. User name
 * @property string          $phone_number     _Optional_. User's phone number
 * @property string          $email            _Optional_. User email
 * @property ShippingAddress $shipping_address _Optional_. User shipping address
 */
class OrderInfo extends TelegramObject
{
    protected function relations()
    {
        return [
            'name' => 'string',
            'phone_number' => 'string',
            'email' => 'string',
            'shipping_address' => ShippingAddress::class,
        ];
    }
}
