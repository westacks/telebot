<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains basic information about a refunded payment.
 *
 * @property string $currency                   Three-letter ISO 4217 [currency](https://core.telegram.org/bots/payments#supported-currencies) code, or “XTR” for payments in [Telegram Stars](https://t.me/BotNews/90). Currently, always “XTR”
 * @property int    $total_amount               Total refunded price in the smallest units of the currency (integer, __not__ float/double). For example, for a price of US$ 1.45, total_amount = 145. See the exp parameter in [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property string $invoice_payload            Bot-specified invoice payload
 * @property string $telegram_payment_charge_id Telegram payment identifier
 * @property string $provider_payment_charge_id Optional. Provider payment identifier
 */
class RefundedPayment extends TelegramObject
{
    protected $attributes = [
        'currency' => 'string',
        'total_amount' => 'integer',
        'invoice_payload' => 'string',
        'telegram_payment_charge_id' => 'string',
        'provider_payment_charge_id' => 'string',
    ];
}
