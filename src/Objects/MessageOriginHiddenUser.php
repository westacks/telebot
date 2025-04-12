<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The message was originally sent by an unknown user.
 * @property-read string $type Type of the message origin, always “hidden_user”
 * @property-read int $date Date the message was sent originally in Unix time
 * @property-read string $sender_user_name Name of the user that sent the message originally
 *
 * @see https://core.telegram.org/bots/api#messageoriginhiddenuser
 */
class MessageOriginHiddenUser extends MessageOrigin
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly string $sender_user_name,
    ) {
    }
}
