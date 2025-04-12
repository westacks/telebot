<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Returns the bot's Telegram Star transactions in chronological order. On success, returns a StarTransactions object.
 *
 * @property-read ?int $offset Number of transactions to skip in the response
 * @property-read ?int $limit The maximum number of transactions to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 *
 * @see https://core.telegram.org/bots/api#getstartransactions
 */
class GetStarTransactionsMethod extends TelegramMethod
{
    protected string $method = 'getStarTransactions';
    protected array $expect = ['StarTransactions'];

    public function __construct(
        public readonly ?int $offset,
        public readonly ?int $limit,
    ) {
    }
}
