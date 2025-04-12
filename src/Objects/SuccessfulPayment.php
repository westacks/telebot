<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains basic information about a successful payment. Note that if the buyer initiates a chargeback with the relevant payment provider following this transaction, the funds may be debited from your balance. This is outside of Telegram's control.
 * @property-read string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
 * @property-read int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property-read string $invoice_payload Bot-specified invoice payload
 * @property-read ?int $subscription_expiration_date Optional. Expiration date of the subscription, in Unix time; for recurring payments only
 * @property-read ?true $is_recurring Optional. True, if the payment is a recurring payment for a subscription
 * @property-read ?true $is_first_recurring Optional. True, if the payment is the first payment for a subscription
 * @property-read ?string $shipping_option_id Optional. Identifier of the shipping option chosen by the user
 * @property-read ?OrderInfo $order_info Optional. Order information provided by the user
 * @property-read string $telegram_payment_charge_id Telegram payment identifier
 * @property-read string $provider_payment_charge_id Provider payment identifier
 *
 * @see https://core.telegram.org/bots/api#successfulpayment
 */
class SuccessfulPayment extends TelegramObject
{
    public function __construct(
        public readonly string $currency,
        public readonly int $total_amount,
        public readonly string $invoice_payload,
        public readonly ?int $subscription_expiration_date,
        public readonly ?true $is_recurring,
        public readonly ?true $is_first_recurring,
        public readonly ?string $shipping_option_id,
        public readonly ?OrderInfo $order_info,
        public readonly string $telegram_payment_charge_id,
        public readonly string $provider_payment_charge_id,
    ) {
    }
}
