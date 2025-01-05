<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\StarTransaction;
use WeStacks\TeleBot\Objects\StarTransactions;

/**
 * Returns the bot's Telegram Star transactions in chronological order. On success, returns a [StarTransactions](https://core.telegram.org/bots/api#startransactions) object.
 *
 * @property int $offset __Required: Optional__. Number of transactions to skip in the response
 * @property int $limit  __Required: Optional__. The maximum number of transactions to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 */
class GetStarTransactionsMethod extends TelegramMethod
{
    protected string $method = 'getStarTransactions';

    protected string $expect = 'StarTransactions';

    protected array $parameters = [
        'offset' => 'integer',
        'limit' => 'integer',
    ];

    public function mock($arguments)
    {
        return new StarTransactions([
            new StarTransaction([
                'id' => rand(1, 100),
                'amount' => rand(1, 100),
                'date' => time(),
            ]),
        ]);
    }
}
