<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the type of a reaction. Currently, it can be one of
 *
 * - [ReactionTypeEmoji](https://core.telegram.org/bots/api#reactiontypeemoji)
 * - [ReactionTypeCustomEmoji](https://core.telegram.org/bots/api#reactiontypecustomemoji)
 */
abstract class ReactionType extends TelegramObject
{
    protected static $types = [
        'emoji' => ReactionTypeEmoji::class,
        'custom_emoji' => ReactionTypeCustomEmoji::class,
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
