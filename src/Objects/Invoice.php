<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains basic information about an invoice.
 * @property-read string $title Product name
 * @property-read string $description Product description
 * @property-read string $start_parameter Unique bot deep-linking parameter that can be used to generate this invoice
 * @property-read string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
 * @property-read int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 *
 * @see https://core.telegram.org/bots/api#invoice
 */
class Invoice extends TelegramObject
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $start_parameter,
        public readonly string $currency,
        public readonly int $total_amount,
    ) {
    }
}
