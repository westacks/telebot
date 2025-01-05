<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the type of a reaction. Currently, it can be one of
 *
 * - [PaidMediaPreview](https://core.telegram.org/bots/api#paidmediapreview)
 * - [PaidMediaPhoto](https://core.telegram.org/bots/api#paidmediaphoto)
 * - [PaidMediaVideo](https://core.telegram.org/bots/api#paidmediavideo)
 */
abstract class PaidMedia extends TelegramObject
{
    protected static $types = [
        'preview' => PaidMediaPreview::class,
        'photo' => PaidMediaPhoto::class,
        'video' => PaidMediaVideo::class,
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
