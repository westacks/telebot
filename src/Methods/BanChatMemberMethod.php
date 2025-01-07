<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless [unbanned](https://core.telegram.org/bots/api#unbanchatmember) first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property string $chat_id         __Required: Yes__. Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
 * @property int    $user_id         __Required: Yes__. Unique identifier of the target user
 * @property int    $until_date      __Required: Optional__. Date when the user will be unbanned; Unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
 * @property bool   $revoke_messages __Required: Optional__. Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.
 */
class BanChatMemberMethod extends TelegramMethod
{
    protected string $method = 'banChatMember';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'user_id' => 'integer',
        'until_date' => 'integer',
        'revoke_messages' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
