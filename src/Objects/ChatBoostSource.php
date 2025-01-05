<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the source of a chat boost. It can be one of
 *
 * - [ChatBoostSourcePremium](https://core.telegram.org/bots/api#chatboostsourcepremium)
 * - [ChatBoostSourceGiftCode](https://core.telegram.org/bots/api#chatboostsourcegiftcode)
 * - [ChatBoostSourceGiveaway](https://core.telegram.org/bots/api#chatboostsourcegiveaway)
 */
abstract class ChatBoostSource extends TelegramObject
{
    protected static $types = [
        'premium' => ChatBoostSourcePremium::class,
        'gift_code' => ChatBoostSourceGiftCode::class,
        'giveaway' => ChatBoostSourceGiveaway::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        if ($class = static::$types[$object['source'] ?? null] ?? null) {
            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }
}
