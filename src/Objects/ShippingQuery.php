<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains information about an incoming shipping query.
 *
 * @property string          $id               Unique query identifier
 * @property User            $from             User who sent the query
 * @property string          $invoice_payload  Bot-specified invoice payload
 * @property ShippingAddress $shipping_address User specified shipping address
 */
class ShippingQuery extends TelegramObject
{
    protected $attributes = [
        'id' => 'string',
        'from' => 'User',
        'invoice_payload' => 'string',
        'shipping_address' => 'ShippingAddress',
    ];
}
