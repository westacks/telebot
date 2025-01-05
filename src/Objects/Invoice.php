<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains basic information about an invoice.
 *
 * @property string $title           Product name
 * @property string $description     Product description
 * @property string $start_parameter Unique bot deep-linking parameter that can be used to generate this invoice
 * @property string $currency        Three-letter ISO 4217 [currency](https://core.telegram.org/bots/payments#supported-currencies) code, or “XTR” for payments in [Telegram Stars](https://t.me/BotNews/90)
 * @property int    $total_amount    Total price in the smallest units of the currency (integer, __not__ float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 */
class Invoice extends TelegramObject
{
    protected $attributes = [
        'title' => 'string',
        'description' => 'string',
        'start_parameter' => 'string',
        'currency' => 'string',
        'total_amount' => 'integer',
    ];
}
