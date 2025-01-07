<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a withdrawal transaction with Fragment.
 *
 * @property string                                                                                     $type             Type of the transaction partner, always “fragment”
 * @property RevenueWithdrawalStateFailed|RevenueWithdrawalStatePending|RevenueWithdrawalStateSucceeded $withdrawal_state Optional. State of the transaction if the transaction is outgoing
 */
class TransactionPartnerFragment extends TransactionPartner
{
    protected $attributes = [
        'type' => 'string',
        'withdrawal_state' => 'RevenueWithdrawalState',
    ];
}
