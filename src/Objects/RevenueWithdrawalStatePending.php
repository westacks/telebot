<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The withdrawal is in progress.
 * @property-read string $type Type of the state, always “pending”
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 */
class RevenueWithdrawalStatePending extends RevenueWithdrawalState
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
