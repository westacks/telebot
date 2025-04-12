<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The withdrawal succeeded.
 * @property-read string $type Type of the state, always “succeeded”
 * @property-read int $date Date the withdrawal was completed in Unix time
 * @property-read string $url An HTTPS URL that can be used to see transaction details
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded
 */
class RevenueWithdrawalStateSucceeded extends RevenueWithdrawalState
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly string $url,
    ) {
    }
}
