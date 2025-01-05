<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains basic information about a successful payment.
 *
 * @property string    $currency                     Three-letter ISO 4217 [currency](https://core.telegram.org/bots/payments#supported-currencies) code, or “XTR” for payments in [Telegram Stars](https://t.me/BotNews/90)
 * @property int       $total_amount                 Total price in the smallest units of the currency (integer, __not__ float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property string    $invoice_payload              Bot-specified invoice payload
 * @property int       $subscription_expiration_date Optional. Expiration date of the subscription, in Unix time; for recurring payments only
 * @property bool      $is_recurring                 Optional. True, if the payment is a recurring payment for a subscription
 * @property bool      $is_first_recurring           Optional. True, if the payment is the first payment for a subscription
 * @property string    $shipping_option_id           Optional. Identifier of the shipping option chosen by the user
 * @property OrderInfo $order_info                   Optional. Order information provided by the user
 * @property string    $telegram_payment_charge_id   Telegram payment identifier
 * @property string    $provider_payment_charge_id   Provider payment identifier
 */
class SuccessfulPayment extends TelegramObject
{
    protected $attributes = [
        'currency' => 'string',
        'total_amount' => 'integer',
        'invoice_payload' => 'string',
        'subscription_expiration_date' => 'integer',
        'is_recurring' => 'boolean',
        'is_first_recurring' => 'boolean',
        'shipping_option_id' => 'string',
        'order_info' => 'OrderInfo',
        'telegram_payment_charge_id' => 'string',
        'provider_payment_charge_id' => 'string',
    ];
}
