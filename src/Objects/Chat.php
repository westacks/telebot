<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a chat.
 * @property-read int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read string $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
 * @property-read ?string $title Optional. Title, for supergroups, channels and group chats
 * @property-read ?string $username Optional. Username, for private chats, supergroups and channels if available
 * @property-read ?string $first_name Optional. First name of the other party in a private chat
 * @property-read ?string $last_name Optional. Last name of the other party in a private chat
 * @property-read ?true $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled)
 *
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat extends TelegramObject
{
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly ?string $title,
        public readonly ?string $username,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?true $is_forum,
    ) {
    }
}
