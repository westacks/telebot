<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatInviteLink;

/**
 * Use this method to create a [subscription invite link](https://telegram.org/blog/superchannels-star-reactions-subscriptions#star-subscriptions) for a channel chat. The bot must have the can_invite_users administrator rights. The link can be edited using the method [editChatSubscriptionInviteLink](https://core.telegram.org/bots/api#editchatsubscriptioninvitelink) or revoked using the method [revokeChatInviteLink](https://core.telegram.org/bots/api#revokechatinvitelink). Returns the new invite link as a [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
 *
 * @property string $chat_id             __Required: Yes__. Unique identifier for the target channel chat or username of the target channel (in the format @channelusername)
 * @property string $name                __Required: Optional__. Invite link name; 0-32 characters
 * @property int    $subscription_period __Required: Yes__. The number of seconds the subscription will be active for before the next payment. Currently, it must always be 2592000 (30 days).
 * @property int    $subscription_price  __Required: Yes__. The amount of Telegram Stars a user must pay initially and after each subsequent subscription period to be a member of the chat; 1-2500
 */
class CreateChatSubscriptionInviteLinkMethod extends TelegramMethod
{
    protected string $method = 'createChatSubscriptionInviteLink';

    protected string $expect = 'ChatInviteLink';

    protected array $parameters = [
        'chat_id' => 'string',
        'name' => 'string',
        'subscription_period' => 'integer',
        'subscription_price' => 'integer',
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
