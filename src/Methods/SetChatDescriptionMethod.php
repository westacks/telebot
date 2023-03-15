<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property string $chat_id     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property string $description __Required: Optional__. New chat description, 0-255 characters
 */
class SetChatDescriptionMethod extends TelegramMethod
{
    protected string $method = 'setChatDescription';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'description' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
