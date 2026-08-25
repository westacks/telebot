<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a chat member that has no additional privileges or restrictions.
 * @property-read string $status The member's status in the chat, always “member”
 * @property-read ?string $tag Optional. Tag of the member
 * @property-read User $user Information about the user
 * @property-read ?int $until_date Optional. Date when the user's subscription will expire; Unix time
 *
 * @see https://core.telegram.org/bots/api#chatmembermember
 */
class ChatMemberMember extends TelegramObject
{
    public function __construct(
        public readonly string $status,
        public readonly ?string $tag,
        public readonly User $user,
        public readonly ?int $until_date,
    ) {
    }
}
