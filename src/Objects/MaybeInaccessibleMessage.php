<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a message that can be inaccessible to the bot. It can be one of
 * - [Message](https://core.telegram.org/bots/api#message)
 * - [InaccessibleMessage](https://core.telegram.org/bots/api#inaccessiblemessage)
 *
 * @see https://core.telegram.org/bots/api#maybeinaccessiblemessage
 */
abstract class MaybeInaccessibleMessage extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match($parameters['date'] == 0) {
            true => InaccessibleMessage::class,
            false => Message::class,
        };
    }
}
