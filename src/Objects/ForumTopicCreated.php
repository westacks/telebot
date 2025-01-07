<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @property string $name                 Name of the topic
 * @property int    $icon_color           Color of the topic icon in RGB format
 * @property string $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
 */
class ForumTopicCreated extends TelegramObject
{
    protected $attributes = [
        'name' => 'string',
        'icon_color' => 'integer',
        'icon_custom_emoji_id' => 'string',
    ];
}
