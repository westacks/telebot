<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\Keyboard\ForceReply;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Keyboard\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\Keyboard\ReplyKeyboardRemove;

/**
 * This object represents the keyboard / reply markup of the message to be sent. It should be one of: InlineKeyboardMarkup, ReplyKeyboardMarkup, ReplyKeyboardRemove, ForceReply.
 */
abstract class Keyboard extends TelegramObject
{
    public static function create($object)
    {
        if (is_object($object)) {
            $object = (array) $object;
        }

        if (isset($object['inline_keyboard'])) {
            return new InlineKeyboardMarkup($object);
        }
        if (isset($object['keyboard'])) {
            return new ReplyKeyboardMarkup($object);
        }
        if (isset($object['remove_keyboard'])) {
            return new ReplyKeyboardRemove($object);
        }
        if (isset($object['force_reply'])) {
            return new ForceReply($object);
        }

        throw TeleBotObjectException::uncastableType(static::class, gettype($object));
    }
}
