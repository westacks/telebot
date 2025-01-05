<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * @property string $chat_id           __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property int    $message_thread_id __Required: Yes__. Unique identifier for the target message thread of the forum topic
 */
class CloseForumTopicMethod extends TelegramMethod
{
    protected string $method = 'closeForumTopic';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
