<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a story.
 *
 * @property Chat $chat Chat that posted the story
 * @property int  $id   Unique identifier for the story in the chat
 */
class Story extends TelegramObject
{
    protected $attributes = [
        'chat' => 'Chat',
        'id' => 'integer',
    ];
}
