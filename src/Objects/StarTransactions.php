<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Contains a list of Telegram Star transactions.
 * @property-read StarTransaction[] $transactions The list of transactions
 *
 * @see https://core.telegram.org/bots/api#startransactions
 */
class StarTransactions extends TelegramObject
{
    public function __construct(
        public readonly array $transactions,
    ) {
    }
}
