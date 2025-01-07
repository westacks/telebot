<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object represents the keyboard / reply markup of the message to be sent. It should be one of
 *
 * - [InlineKeyboardMarkup](https://core.telegram.org/bots/api#inlinekeyboardmarkup)
 * - [ReplyKeyboardMarkup](https://core.telegram.org/bots/api#replykeyboardmarkup)
 * - [ReplyKeyboardRemove](https://core.telegram.org/bots/api#replykeyboardremove)
 * - [ForceReply](https://core.telegram.org/bots/api#forcereply)
 */
abstract class Keyboard extends TelegramObject
{
    private static $types = [
        'inline_keyboard' => InlineKeyboardMarkup::class,
        'keyboard' => ReplyKeyboardMarkup::class,
        'remove_keyboard' => ReplyKeyboardRemove::class,
        'force_reply' => ForceReply::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        foreach (static::$types as $type => $class) {
            if (!isset($object[$type])) {
                continue;
            }

            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }
}
