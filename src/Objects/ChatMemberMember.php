<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a chat member that has no additional privileges or restrictions.
 * @property-read string $status The member's status in the chat, always “member”
 * @property-read User $user Information about the user
 * @property-read ?int $until_date Optional. Date when the user's subscription will expire; Unix time
 *
 * @see https://core.telegram.org/bots/api#chatmembermember
 */
class ChatMemberMember extends ChatMember
{
    public function __construct(
        public readonly string $status,
        public readonly User $user,
        public readonly ?int $until_date,
    ) {
    }
}
