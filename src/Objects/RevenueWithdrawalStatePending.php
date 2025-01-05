<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The withdrawal is in progress.
 *
 * @property string $type Type of the state, always “pending”
 */
class RevenueWithdrawalStatePending extends RevenueWithdrawalState
{
    protected $attributes = [
        'type' => 'string',
    ];
}
