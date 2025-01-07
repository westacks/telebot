<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to unban a previously banned user in a supergroup or channel. The user will __not__ return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be __removed__ from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
 *
 * @property string $chat_id        __Required: Yes__. Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
 * @property int    $user_id        __Required: Yes__. Unique identifier of the target user
 * @property bool   $only_if_banned __Required: Optional__. Do nothing if the user is not banned
 */
class UnbanChatMemberMethod extends TelegramMethod
{
    protected string $method = 'unbanChatMember';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'user_id' => 'integer',
        'only_if_banned' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
