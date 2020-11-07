<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a unique message identifier.
 *
 * @property string         $message_id    Unique message identifier
 */
class MessageId extends TelegramObject
{
    protected function relations()
    {
        return [
            'message_id' => 'string',
        ];
    }
}
