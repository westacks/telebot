<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes an amount of Telegram Stars.
 * @property-read int $amount Integer amount of Telegram Stars, rounded to 0; can be negative
 * @property-read ?int $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars; from -999999999 to 999999999; can be negative if and only if amount is non-positive
 *
 * @see https://core.telegram.org/bots/api#staramount
 */
class StarAmount extends TelegramObject
{
    public function __construct(
        public readonly int $amount,
        public readonly ?int $nanostar_amount,
    ) {
    }
}
