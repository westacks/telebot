<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about an incoming pre-checkout query.
 * @property-read string $id Unique query identifier
 * @property-read User $from User who sent the query
 * @property-read string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
 * @property-read int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property-read string $invoice_payload Bot-specified invoice payload
 * @property-read ?string $shipping_option_id Optional. Identifier of the shipping option chosen by the user
 * @property-read ?OrderInfo $order_info Optional. Order information provided by the user
 *
 * @see https://core.telegram.org/bots/api#precheckoutquery
 */
class PreCheckoutQuery extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly User $from,
        public readonly string $currency,
        public readonly int $total_amount,
        public readonly string $invoice_payload,
        public readonly ?string $shipping_option_id,
        public readonly ?OrderInfo $order_info,
    ) {
    }
}
