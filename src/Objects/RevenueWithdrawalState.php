<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the state of a revenue withdrawal operation. Currently, it can be one of
 * - [RevenueWithdrawalStatePending](https://core.telegram.org/bots/api#revenuewithdrawalstatepending)
 * - [RevenueWithdrawalStateSucceeded](https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded)
 * - [RevenueWithdrawalStateFailed](https://core.telegram.org/bots/api#revenuewithdrawalstatefailed)
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstate
 */
abstract class RevenueWithdrawalState extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'pending' => RevenueWithdrawalStatePending::class,
            'succeeded' => RevenueWithdrawalStateSucceeded::class,
            'failed' => RevenueWithdrawalStateFailed::class,
            default => throw new \InvalidArgumentException("Unknown RevenueWithdrawalState: ".$parameters['type']),
        };
    }
}
