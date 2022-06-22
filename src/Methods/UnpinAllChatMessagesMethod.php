<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 */
class UnpinAllChatMessagesMethod extends TelegramMethod
{
    protected string $method = 'unpinAllChatMessages';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
