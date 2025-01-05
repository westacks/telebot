<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatMember;

/**
 * Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the bot is an administrator in the chat. Returns a [ChatMember](https://core.telegram.org/bots/api#chatmember) object on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * @property int    $user_id __Required: Yes__. Unique identifier of the target user
 */
class GetChatMemberMethod extends TelegramMethod
{
    protected string $method = 'getChatMember';

    protected string $expect = 'ChatMember';

    protected array $parameters = [
        'chat_id' => 'string',
        'user_id' => 'integer',
    ];

    public function mock($arguments)
    {
        return ChatMember::create([
            'user' => [
                'id' => $arguments['user_id'],
                'first_name' => 'First',
                'last_name' => 'Last',
                'username' => 'username',
            ],
            'status' => [
                'creator',
                'administrator',
                'member',
                'restricted',
                'left',
                'kicked',
            ][rand(0, 5)],
        ]);
    }
}
