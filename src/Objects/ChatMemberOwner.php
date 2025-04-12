<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a chat member that owns the chat and has all administrator privileges.
 * @property-read string $status The member's status in the chat, always “creator”
 * @property-read User $user Information about the user
 * @property-read bool $is_anonymous True, if the user's presence in the chat is hidden
 * @property-read ?string $custom_title Optional. Custom title for this user
 *
 * @see https://core.telegram.org/bots/api#chatmemberowner
 */
class ChatMemberOwner extends ChatMember
{
    public function __construct(
        public readonly string $status,
        public readonly User $user,
        public readonly bool $is_anonymous,
        public readonly ?string $custom_title,
    ) {
    }
}
