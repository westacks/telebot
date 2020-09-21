<?php

namespace WeStacks\TeleBot\Objects\Payments;

use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\User;

/**
 * This object contains information about an incoming shipping query.
 *
 * @property string          $id               Unique query identifier
 * @property User            $from             User who sent the query
 * @property string          $invoice_payload  Bot specified invoice payload
 * @property ShippingAddress $shipping_address User specified shipping address
 */
class ShippingQuery extends TelegramObject
{
    protected function relations()
    {
        return [
            'id' => 'string',
            'from' => User::class,
            'invoice_payload' => 'string',
            'shipping_address' => ShippingAddress::class,
        ];
    }
}
