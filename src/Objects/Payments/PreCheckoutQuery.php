<?php

namespace WeStacks\TeleBot\Objects\Payments;

use WeStacks\TeleBot\Objects\TelegramObject;
use WeStacks\TeleBot\Objects\User;

/**
 * This object contains information about an incoming pre-checkout query.
 * 
 * @property String                  $id                      Unique query identifier
 * @property User                    $from                    User who sent the query
 * @property String                  $currency                Three-letter ISO 4217 currency code
 * @property Integer                 $total_amount            Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property String                  $invoice_payload         Bot specified invoice payload
 * @property String                  $shipping_option_id      Optional. Identifier of the shipping option chosen by the user
 * @property OrderInfo               $order_info              Optional. Order info provided by the user
 * 
 * @package WeStacks\TeleBot\Objects\Payments
 */
class PreCheckoutQuery extends TelegramObject
{
    protected function relations()
    {
        return [
            'id'                    => 'string',
            'from'                  => User::class,
            'currency'              => 'string',
            'total_amount'          => 'integer',
            'invoice_payload'       => 'string',
            'shipping_option_id'    => 'string',
            'order_info'            => OrderInfo::class
        ];
    }
}