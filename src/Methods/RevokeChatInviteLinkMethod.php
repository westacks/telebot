<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
 *
 * @property-read int|string $chat_id Unique identifier of the target chat or username of the target channel (in the format @channelusername)
 * @property-read string $invite_link The invite link to revoke
 *
 * @see https://core.telegram.org/bots/api#revokechatinvitelink
 */
class RevokeChatInviteLinkMethod extends TelegramMethod
{
    protected string $method = 'revokeChatInviteLink';
    protected array $expect = ['ChatInviteLink'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly string $invite_link,
    ) {
    }
}
