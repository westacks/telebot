<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * The withdrawal failed and the transaction was refunded.
 * @property-read string $type Type of the state, always “failed”
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 */
class RevenueWithdrawalStateFailed extends TelegramObject
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
