<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 * @property-read int $start_date Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
 *
 * @see https://core.telegram.org/bots/api#videochatscheduled
 */
class VideoChatScheduled extends TelegramObject
{
    public function __construct(
        public readonly int $start_date,
    ) {
    }
}
