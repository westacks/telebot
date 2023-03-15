<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatInviteLink;

/**
 * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
 *
 * @property string $chat_id     __Required: Yes__. Unique identifier of the target chat or username of the target channel (in the format @channelusername)
 * @property string $invite_link __Required: Yes__. The invite link to revoke
 */
class RevokeChatInviteLinkMethod extends TelegramMethod
{
    protected string $method = 'revokeChatInviteLink';

    protected string $expect = 'ChatInviteLink';

    protected array $parameters = [
        'chat_id' => 'string',
        'invite_link' => 'string',
    ];

    public function mock($arguments)
    {
        return new ChatInviteLink([
            'creator' => [
                'id' => '123456789',
                'first_name' => 'First',
                'last_name' => 'Last',
                'username' => 'username',
            ],
            'invite_link' => $arguments['invite_link'],
            'is_revoked' => true,
            'is_primary' => false,
            'creates_join_request' => false,
        ]);
    }
}
