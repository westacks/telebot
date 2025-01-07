<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * @property string $chat_id              __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property int    $message_thread_id    __Required: Yes__. Unique identifier for the target message thread of the forum topic
 * @property string $name                 __Required: Optional__. New topic name, 0-128 characters. If not specified or empty, the current name of the topic will be kept
 * @property string $icon_custom_emoji_id __Required: Optional__. New unique identifier of the custom emoji shown as the topic icon. Use [getForumTopicIconStickers](https://core.telegram.org/bots/api#getforumtopiciconstickers) to get all allowed custom emoji identifiers. Pass an empty string to remove the icon. If not specified, the current icon will be kept
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
