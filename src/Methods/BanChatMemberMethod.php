<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ?int $until_date Date when the user will be unbanned; Unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
 * @property-read ?bool $revoke_messages Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.
 *
 * @see https://core.telegram.org/bots/api#banchatmember
 */
class BanChatMemberMethod extends TelegramMethod
{
    protected string $method = 'banChatMember';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
        public readonly ?int $until_date,
        public readonly ?bool $revoke_messages,
    ) {
    }
}
