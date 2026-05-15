<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to set a tag for a regular member in a group or a supergroup. The bot must be an administrator in the chat for this to work and must have the can_manage_tags administrator right. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ?string $tag New tag for the member; 0-16 characters, emoji are not allowed
 *
 * @see https://core.telegram.org/bots/api#setchatmembertag
 */
class SetChatMemberTagMethod extends TelegramMethod
{
    protected string $method = 'setChatMemberTag';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
        public readonly ?string $tag,
    ) {
    }
}
