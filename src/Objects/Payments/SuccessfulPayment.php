<?php

namespace WeStacks\TeleBot\Objects\Payments;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object contains basic information about a successful payment.
 *
 * @property string    $currency                   Three-letter ISO 4217 currency code
 * @property int       $total_amount               Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property string    $invoice_payload            Bot specified invoice payload
 * @property string    $shipping_option_id         _Optional_. Identifier of the shipping option chosen by the user
 * @property OrderInfo $order_info                 _Optional_. Order info provided by the user
 * @property string    $telegram_payment_charge_id Telegram payment identifier
 * @property string    $provider_payment_charge_id Provider payment identifier
 */
class SuccessfulPayment extends TelegramObject
{
    protected function relations()
    {
        return [
            'currency' => 'string',
            'total_amount' => 'integer',
            'invoice_payload' => 'string',
            'shipping_option_id' => 'string',
            'order_info' => OrderInfo::class,
            'telegram_payment_charge_id' => 'string',
            'provider_payment_charge_id' => 'string',
        ];
    }
}
