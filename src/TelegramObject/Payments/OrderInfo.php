<?php

namespace WeStacks\TeleBot\TelegramObject\Payments;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents information about an order.
 * 
 * @property String                    $name                    _Optional_. User name
 * @property String                    $phone_number            _Optional_. User's phone number
 * @property String                    $email                   _Optional_. User email
 * @property ShippingAddress           $shipping_address        _Optional_. User shipping address
 * 
 * @package WeStacks\TeleBot\TelegramObject\Payments
 */
class OrderInfo extends TelegramObject
{
    protected function relations()
    {
        return [
            'name'              => 'string',
            'phone_number'      => 'string',
            'email'             => 'string',
            'shipping_address'  => ShippingAddress::class
        ];
    }
}