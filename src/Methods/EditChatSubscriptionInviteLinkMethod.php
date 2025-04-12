<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to edit a subscription invite link created by the bot. The bot must have the can_invite_users administrator rights. Returns the edited invite link as a ChatInviteLink object.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read string $invite_link The invite link to edit
 * @property-read ?string $name Invite link name; 0-32 characters
 *
 * @see https://core.telegram.org/bots/api#editchatsubscriptioninvitelink
 */
class EditChatSubscriptionInviteLinkMethod extends TelegramMethod
{
    protected string $method = 'editChatSubscriptionInviteLink';
    protected array $expect = ['ChatInviteLink'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly string $invite_link,
        public readonly ?string $name,
    ) {
    }
}
