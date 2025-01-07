<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about an edited forum topic.
 *
 * @property string $name                 Optional. New name of the topic, if it was edited
 * @property string $icon_custom_emoji_id Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
 */
class ForumTopicEdited extends TelegramObject
{
    protected $attributes = [
        'name' => 'string',
        'icon_custom_emoji_id' => 'string',
    ];
}
