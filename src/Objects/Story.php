<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a story.
 * @property-read Chat $chat Chat that posted the story
 * @property-read int $id Unique identifier for the story in the chat
 *
 * @see https://core.telegram.org/bots/api#story
 */
class Story extends TelegramObject
{
    public function __construct(
        public readonly Chat $chat,
        public readonly int $id,
    ) {
    }
}
