<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 * @property-read string $status The member's status in the chat, always “left”
 * @property-read User $user Information about the user
 *
 * @see https://core.telegram.org/bots/api#chatmemberleft
 */
class ChatMemberLeft extends TelegramObject
{
    public function __construct(
        public readonly string $status,
        public readonly User $user,
    ) {
    }
}
