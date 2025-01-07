<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object describes a message that can be inaccessible to the bot. It can be one of
 *
 * - [Message](https://core.telegram.org/bots/api#message)
 * - [InaccessibleMessage](https://core.telegram.org/bots/api#inaccessiblemessage)
 */
abstract class MaybeInaccessibleMessage extends TelegramObject
{
    protected static $types = [
        'default' => Message::class,
        'inaccessible' => InaccessibleMessage::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        return ($object['date'] ?? null) === 0
            ? new static::$types['inaccessible']($object)
            : new static::$types['default']($object);
    }
}
