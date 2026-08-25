<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * A method to get the current Telegram Stars balance of the bot. Requires no parameters. On success, returns a StarAmount object.
 *
 *
 * @see https://core.telegram.org/bots/api#getmystarbalance
 */
class GetMyStarBalanceMethod extends TelegramMethod
{
    protected string $method = 'getMyStarBalance';
    protected array $expect = ['StarAmount'];

    public function __construct()
    {
    }
}
