<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The message was originally sent by a known user.
 * @property-read string $type Type of the message origin, always “user”
 * @property-read int $date Date the message was sent originally in Unix time
 * @property-read User $sender_user User that sent the message originally
 *
 * @see https://core.telegram.org/bots/api#messageoriginuser
 */
class MessageOriginUser extends MessageOrigin
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly User $sender_user,
    ) {
    }
}
