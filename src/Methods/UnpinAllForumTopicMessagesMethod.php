<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
 *
 * @property string $chat_id           __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property int    $message_thread_id __Required: Yes__. Unique identifier for the target message thread of the forum topic
 */
class UnpinAllForumTopicMessagesMethod extends TelegramMethod
{
    protected string $method = 'unpinAllForumTopicMessages';

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
