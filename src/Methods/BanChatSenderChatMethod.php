<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is [unbanned](https://core.telegram.org/bots/api#unbanchatsenderchat), the owner of the banned chat won't be able to send messages on behalf of __any of their channels__. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property string $chat_id        __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $sender_chat_id __Required: Yes__. Unique identifier of the target sender chat
 */
class BanChatSenderChatMethod extends TelegramMethod
{
    protected string $method = 'banChatSenderChat';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'sender_chat_id' => 'integer',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
