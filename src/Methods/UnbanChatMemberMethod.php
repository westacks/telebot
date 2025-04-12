<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ?bool $only_if_banned Do nothing if the user is not banned
 *
 * @see https://core.telegram.org/bots/api#unbanchatmember
 */
class UnbanChatMemberMethod extends TelegramMethod
{
    protected string $method = 'unbanChatMember';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
        public readonly ?bool $only_if_banned,
    ) {
    }
}
