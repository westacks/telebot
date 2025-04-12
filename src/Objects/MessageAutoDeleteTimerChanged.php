<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 * @property-read int $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
 *
 * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged
 */
class MessageAutoDeleteTimerChanged extends TelegramObject
{
    public function __construct(
        public readonly int $message_auto_delete_time,
    ) {
    }
}
