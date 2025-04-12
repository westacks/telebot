<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to create a subscription invite link for a channel chat. The bot must have the can_invite_users administrator rights. The link can be edited using the method editChatSubscriptionInviteLink or revoked using the method revokeChatInviteLink. Returns the new invite link as a ChatInviteLink object.
 *
 * @property-read int|string $chat_id Unique identifier for the target channel chat or username of the target channel (in the format @channelusername)
 * @property-read ?string $name Invite link name; 0-32 characters
 * @property-read int $subscription_period The number of seconds the subscription will be active for before the next payment. Currently, it must always be 2592000 (30 days).
 * @property-read int $subscription_price The amount of Telegram Stars a user must pay initially and after each subsequent subscription period to be a member of the chat; 1-10000
 *
 * @see https://core.telegram.org/bots/api#createchatsubscriptioninvitelink
 */
class CreateChatSubscriptionInviteLinkMethod extends TelegramMethod
{
    protected string $method = 'createChatSubscriptionInviteLink';
    protected array $expect = ['ChatInviteLink'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?string $name,
        public readonly int $subscription_period,
        public readonly int $subscription_price,
    ) {
    }
}
