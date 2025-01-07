<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The withdrawal failed and the transaction was refunded.
 *
 * @property string $type Type of the state, always “failed”
 */
class RevenueWithdrawalStateFailed extends RevenueWithdrawalState
{
    protected $attributes = [
        'type' => 'string',
    ];
}
