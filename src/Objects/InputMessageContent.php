<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object represents the content of a message to be sent as a result of an inline query. Telegram clients currently support the following 5 types:
 *
 * - [InputTextMessageContent](https://core.telegram.org/bots/api#inputtextmessagecontent)
 * - [InputLocationMessageContent](https://core.telegram.org/bots/api#inputlocationmessagecontent)
 * - [InputVenueMessageContent](https://core.telegram.org/bots/api#inputvenuemessagecontent)
 * - [InputContactMessageContent](https://core.telegram.org/bots/api#inputcontactmessagecontent)
 * - [InputInvoiceMessageContent](https://core.telegram.org/bots/api#inputinvoicemessagecontent)
 */
abstract class InputMessageContent extends TelegramObject
{
    private static $types = [
        'message_text' => InputTextMessageContent::class,
        'address' => InputVenueMessageContent::class,
        'latitude' => InputLocationMessageContent::class,
        'phone_number' => InputContactMessageContent::class,
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
