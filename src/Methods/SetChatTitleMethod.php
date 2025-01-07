<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property string $title   __Required: Yes__. New chat title, 1-128 characters
 */
class SetChatTitleMethod extends TelegramMethod
{
    protected string $method = 'setChatTitle';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'title' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
