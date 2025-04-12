<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a withdrawal transaction with Fragment.
 * @property-read string $type Type of the transaction partner, always “fragment”
 * @property-read ?RevenueWithdrawalState $withdrawal_state Optional. State of the transaction if the transaction is outgoing
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerfragment
 */
class TransactionPartnerFragment extends TransactionPartner
{
    public function __construct(
        public readonly string $type,
        public readonly ?RevenueWithdrawalState $withdrawal_state,
    ) {
    }
}
