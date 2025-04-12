<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains basic information about a refunded payment.
 * @property-read string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars. Currently, always “XTR”
 * @property-read int $total_amount Total refunded price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45, total_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property-read string $invoice_payload Bot-specified invoice payload
 * @property-read string $telegram_payment_charge_id Telegram payment identifier
 * @property-read ?string $provider_payment_charge_id Optional. Provider payment identifier
 *
 * @see https://core.telegram.org/bots/api#refundedpayment
 */
class RefundedPayment extends TelegramObject
{
    public function __construct(
        public readonly string $currency,
        public readonly int $total_amount,
        public readonly string $invoice_payload,
        public readonly string $telegram_payment_charge_id,
        public readonly ?string $provider_payment_charge_id,
    ) {
    }
}
