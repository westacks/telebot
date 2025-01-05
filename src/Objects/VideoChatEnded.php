<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about a video chat ended in the chat.
 *
 * @property int $duration Video chat duration in seconds
 */
class VideoChatEnded extends TelegramObject
{
    protected $attributes = [
        'duration' => 'integer',
    ];
}
