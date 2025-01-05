<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the origin of a message. It can be one of
 *
 * - [MessageOriginUser](https://core.telegram.org/bots/api#messageoriginuser)
 * - [MessageOriginHiddenUser](https://core.telegram.org/bots/api#messageoriginhiddenuser)
 * - [MessageOriginChat](https://core.telegram.org/bots/api#messageoriginchat)
 * - [MessageOriginChannel](https://core.telegram.org/bots/api#messageoriginchannel)
 */
abstract class MessageOrigin extends TelegramObject
{
    protected static $types = [
        'user' => MessageOriginUser::class,
        'hidden_user' => MessageOriginHiddenUser::class,
        'chat' => MessageOriginChat::class,
        'channel' => MessageOriginChannel::class,
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
