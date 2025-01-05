<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 */
class UnpinAllGeneralForumTopicMessagesMethod extends TelegramMethod
{
    protected string $method = 'unpinAllGeneralForumTopicMessages';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
