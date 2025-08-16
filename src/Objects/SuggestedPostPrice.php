<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Desribes price of a suggested post.
 * @property-read string $currency Currency in which the post will be paid. Currently, must be one of “XTR” for Telegram Stars or “TON” for toncoins
 * @property-read int $amount The amount of the currency that will be paid for the post in the smallest units of the currency, i.e. Telegram Stars or nanotoncoins. Currently, price in Telegram Stars must be between 5 and 100000, and price in nanotoncoins must be between 10000000 and 10000000000000.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostprice
 */
class SuggestedPostPrice extends TelegramObject
{
    public function __construct(
        public readonly string $currency,
        public readonly int $amount,
    ) {
    }
}
