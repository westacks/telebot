<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a unique message identifier.
 *
 * @property int $message_id Unique message identifier
 */
class MessageId extends TelegramObject
{
    protected $attributes = [
        'message_id' => 'integer',
    ];
}
