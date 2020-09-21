<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\InputMessageContent\InputContactMessageContent;
use WeStacks\TeleBot\Objects\InputMessageContent\InputLocationMessageContent;
use WeStacks\TeleBot\Objects\InputMessageContent\InputTextMessageContent;
use WeStacks\TeleBot\Objects\InputMessageContent\InputVenueMessageContent;

/**
 * This object represents the content of a message to be sent as a result of an inline query. Telegram clients currently support the following 4 types: InputTextMessageContent, InputLocationMessageContent, InputVenueMessageContent, InputContactMessageContent.
 */
abstract class InputMessageContent extends TelegramObject
{
    public static function create($object)
    {
        if (is_object($object)) {
            $object = (array) $object;
        }

        if (isset($object['message_text'])) {
            return new InputTextMessageContent($object);
        }
        if (isset($object['address'])) {
            return new InputVenueMessageContent($object);
        }
        if (isset($object['latitude'])) {
            return new InputLocationMessageContent($object);
        }
        if (isset($object['phone_number'])) {
            return new InputContactMessageContent($object);
        }

        throw TeleBotObjectException::uncastableType(static::class, gettype($object));
    }
}
