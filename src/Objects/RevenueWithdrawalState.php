<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the state of a revenue withdrawal operation. Currently, it can be one of
 *
 * - [RevenueWithdrawalStatePending](https://core.telegram.org/bots/api#revenuewithdrawalstatepending)
 * - [RevenueWithdrawalStateSucceeded](https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded)
 * - [RevenueWithdrawalStateFailed](https://core.telegram.org/bots/api#revenuewithdrawalstatefailed)
 */
abstract class RevenueWithdrawalState extends TelegramObject
{
    protected static $types = [
        'pending' => RevenueWithdrawalStatePending::class,
        'succeeded' => RevenueWithdrawalStateSucceeded::class,
        'failed' => RevenueWithdrawalStateFailed::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        if ($class = static::$types[$object['type'] ?? null] ?? null) {
            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }
}
