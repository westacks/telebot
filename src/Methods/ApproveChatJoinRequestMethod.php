<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $user_id __Required: Yes__. Unique identifier of the target user
 */
class ApproveChatJoinRequestMethod extends TelegramMethod
{
    protected string $method = 'approveChatJoinRequest';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'user_id' => 'integer',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
