<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @property int $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
 */
class MessageAutoDeleteTimerChanged extends TelegramObject
{
    protected $attributes = [
        'message_auto_delete_time' => 'integer',
    ];
}
