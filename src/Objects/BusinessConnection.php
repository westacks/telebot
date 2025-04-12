<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the connection of the bot with a business account.
 * @property-read string $id Unique identifier of the business connection
 * @property-read User $user Business account user that created the business connection
 * @property-read int $user_chat_id Identifier of a private chat with the user who created the business connection. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read int $date Date the connection was established in Unix time
 * @property-read ?BusinessBotRights $rights Optional. Rights of the business bot
 * @property-read bool $is_enabled True, if the connection is active
 *
 * @see https://core.telegram.org/bots/api#businessconnection
 */
class BusinessConnection extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly User $user,
        public readonly int $user_chat_id,
        public readonly int $date,
        public readonly ?BusinessBotRights $rights,
        public readonly bool $is_enabled,
    ) {
    }
}
