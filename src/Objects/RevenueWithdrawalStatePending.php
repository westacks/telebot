<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * The withdrawal is in progress.
 * @property-read string $type Type of the state, always “pending”
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 */
class RevenueWithdrawalStatePending extends TelegramObject
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
