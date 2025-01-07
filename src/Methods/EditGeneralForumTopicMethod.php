<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property string $name    __Required: Yes__. New topic name, 1-128 characters
 */
class EditGeneralForumTopicMethod extends TelegramMethod
{
    protected string $method = 'editGeneralForumTopic';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'name' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
