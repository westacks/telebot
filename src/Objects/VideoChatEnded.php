<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about a video chat ended in the chat.
 * @property-read int $duration Video chat duration in seconds
 *
 * @see https://core.telegram.org/bots/api#videochatended
 */
class VideoChatEnded extends TelegramObject
{
    public function __construct(
        public readonly int $duration,
    ) {
    }
}
