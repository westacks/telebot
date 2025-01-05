<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatInviteLink;

/**
 * Use this method to edit a subscription invite link created by the bot. The bot must have the can_invite_users administrator rights. Returns the edited invite link as a [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
 *
 * @property string $chat_id     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property string $invite_link __Required: Yes__. The invite link to edit
 * @property string $name        __Required: Optional__. Invite link name; 0-32 characters
 */
class EditChatSubscriptionInviteLinkMethod extends TelegramMethod
{
    protected string $method = 'editChatSubscriptionInviteLink';

    protected string $expect = 'ChatInviteLink';

    protected array $parameters = [
        'chat_id' => 'string',
        'invite_link' => 'string',
        'name' => 'string',
    ];

    public function mock($arguments)
    {
        return new ChatInviteLink([
            'invite_link' => 'https://telegram.me/joinchat/test',
            'creator' => [
                'id' => 1,
                'first_name' => 'First',
                'last_name' => 'Last',
                'username' => 'username',
            ],
            'creates_join_request' => $arguments['creates_join_request'] ?? false,
            'is_primary' => false,
            'is_revoked' => false,
            'name' => $arguments['name'] ?? null,
            'expire_date' => $arguments['expire_date'] ?? null,
            'member_limit' => $arguments['member_limit'] ?? null,
            'pending_join_request_count' => 0,
        ]);
    }
}
