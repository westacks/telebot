<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a unique message identifier.
 * @property-read int $message_id Unique message identifier. In specific instances (e.g., message containing a video sent to a big chat), the server might automatically schedule a message instead of sending it immediately. In such cases, this field will be 0 and the relevant message will be unusable until it is actually sent
 *
 * @see https://core.telegram.org/bots/api#messageid
 */
class MessageId extends TelegramObject
{
    public function __construct(
        public readonly int $message_id,
    ) {
    }
}
