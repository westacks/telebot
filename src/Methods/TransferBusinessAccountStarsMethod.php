<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Transfers Telegram Stars from the business account balance to the bot's balance. Requires the can_transfer_stars business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read int $star_count Number of Telegram Stars to transfer; 1-10000
 *
 * @see https://core.telegram.org/bots/api#transferbusinessaccountstars
 */
class TransferBusinessAccountStarsMethod extends TelegramMethod
{
    protected string $method = 'transferBusinessAccountStars';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly int $star_count,
    ) {
    }
}
