<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes an inline message to be sent by a user of a Mini App.
 * @property-read string $id Unique identifier of the prepared message
 * @property-read int $expiration_date Expiration date of the prepared message, in Unix time. Expired prepared messages can no longer be used
 *
 * @see https://core.telegram.org/bots/api#preparedinlinemessage
 */
class PreparedInlineMessage extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly int $expiration_date,
    ) {
    }
}
