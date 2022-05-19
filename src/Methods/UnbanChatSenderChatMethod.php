<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property string $chat_id        __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $sender_chat_id __Required: Yes__. Unique identifier of the target sender chat
 */
class UnbanChatSenderChatMethod extends TelegramMethod
{
    protected string $method = 'unbanChatSenderChat';

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
