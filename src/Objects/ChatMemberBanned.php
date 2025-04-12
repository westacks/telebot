<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
 * @property-read string $status The member's status in the chat, always “kicked”
 * @property-read User $user Information about the user
 * @property-read int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
 *
 * @see https://core.telegram.org/bots/api#chatmemberbanned
 */
class ChatMemberBanned extends ChatMember
{
    public function __construct(
        public readonly string $status,
        public readonly User $user,
        public readonly int $until_date,
    ) {
    }
}
