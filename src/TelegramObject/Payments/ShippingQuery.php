<?php

namespace WeStacks\TeleBot\TelegramObject\Payments;

use WeStacks\TeleBot\TelegramObject;
use WeStacks\TeleBot\TelegramObject\User;

/**
 * This object contains information about an incoming shipping query.
 * 
 * @property String                    $id                    Unique query identifier
 * @property User                      $from                  User who sent the query
 * @property String                    $invoice_payload       Bot specified invoice payload
 * @property ShippingAddress           $shipping_address      User specified shipping address
 * 
 * @package WeStacks\TeleBot\TelegramObject\Payments
 */
class ShippingQuery extends TelegramObject
{
    protected function relations()
    {
        return [
            'id'                => 'string',
            'from'              => User::class,
            'invoice_payload'   => 'string',
            'shipping_address'  => ShippingAddress::class
        ];
    }
}