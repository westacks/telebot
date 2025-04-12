<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read string $invite_link The invite link to edit
 * @property-read ?string $name Invite link name; 0-32 characters
 * @property-read ?int $expire_date Point in time (Unix timestamp) when the link will expire
 * @property-read ?int $member_limit The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * @property-read ?bool $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
 *
 * @see https://core.telegram.org/bots/api#editchatinvitelink
 */
class EditChatInviteLinkMethod extends TelegramMethod
{
    protected string $method = 'editChatInviteLink';
    protected array $expect = ['ChatInviteLink'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly string $invite_link,
        public readonly ?string $name,
        public readonly ?int $expire_date,
        public readonly ?int $member_limit,
        public readonly ?bool $creates_join_request,
    ) {
    }
}
