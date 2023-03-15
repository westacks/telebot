<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * @property int    $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property int    $message_thread_id      __Required: Yes__. Unique identifier for the target message thread of the forum topic
 * @property string $name	                __Required: Yes__. New topic name, 1-128 characters
 * @property string $icon_custom_emoji_id   __Required: Yes__. New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
 */
class EditForumTopicMethod extends TelegramMethod
{
    protected string $method = 'editForumTopic';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'name' => 'string',
        'icon_custom_emoji_id' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
