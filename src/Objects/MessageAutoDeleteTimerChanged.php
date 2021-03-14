<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @property integer    $message_auto_delete_time       New auto-delete time for messages in the chat
 */
class MessageAutoDeleteTimerChanged extends TelegramObject
{
    protected function relations()
    {
        return [
            'message_auto_delete_time' => 'integer',
        ];
    }
}
