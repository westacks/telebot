<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read int $user_id Unique identifier of the target user
 *
 * @see https://core.telegram.org/bots/api#declinechatjoinrequest
 */
class DeclineChatJoinRequestMethod extends TelegramMethod
{
    protected string $method = 'declineChatJoinRequest';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
    ) {
    }
}
