<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The withdrawal succeeded.
 *
 * @property string $type Type of the state, always “succeeded”
 * @property int    $date Date the withdrawal was completed in Unix time
 * @property string $url  An HTTPS URL that can be used to see transaction details
 */
class RevenueWithdrawalStateSucceeded extends RevenueWithdrawalState
{
    protected $attributes = [
        'type' => 'string',
        'date' => 'integer',
        'url' => 'string',
    ];
}
