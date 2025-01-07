<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Contains a list of Telegram Star transactions.
 *
 * @property StarTransaction[] $transactions The list of transactions
 */
class StarTransactions extends TelegramObject
{
    protected $attributes = [
        'transactions' => 'StarTransaction[]',
    ];
}
