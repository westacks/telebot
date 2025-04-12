<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Returns the amount of Telegram Stars owned by a managed business account. Requires the can_view_gifts_and_stars business bot right. Returns StarAmount on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 *
 * @see https://core.telegram.org/bots/api#getbusinessaccountstarbalance
 */
class GetBusinessAccountStarBalanceMethod extends TelegramMethod
{
    protected string $method = 'getBusinessAccountStarBalance';
    protected array $expect = ['Telegram', 'Stars'];

    public function __construct(
        public readonly string $business_connection_id,
    ) {
    }
}
