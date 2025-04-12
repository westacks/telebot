<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the content of a message to be sent as a result of an inline query. Telegram clients currently support the following 5 types:
 * - [InputTextMessageContent](https://core.telegram.org/bots/api#inputtextmessagecontent)
 * - [InputLocationMessageContent](https://core.telegram.org/bots/api#inputlocationmessagecontent)
 * - [InputVenueMessageContent](https://core.telegram.org/bots/api#inputvenuemessagecontent)
 * - [InputContactMessageContent](https://core.telegram.org/bots/api#inputcontactmessagecontent)
 * - [InputInvoiceMessageContent](https://core.telegram.org/bots/api#inputinvoicemessagecontent)
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent
 */
abstract class InputMessageContent extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match (true) {
            isset($parameters['message_text']) => InputTextMessageContent::class,
            isset($parameters['latitude']) && !isset($parameters['title']) => InputLocationMessageContent::class,
            isset($parameters['latitude']) && isset($parameters['title']) => InputVenueMessageContent::class,
            isset($parameters['phone_number']) => InputContactMessageContent::class,
            isset($parameters['prices']) => InputInvoiceMessageContent::class,
            default => throw new \InvalidArgumentException("Unknown InputMessageContent"),
        };
    }
}
