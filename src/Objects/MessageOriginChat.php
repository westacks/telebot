<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The message was originally sent on behalf of a chat to a group chat.
 * @property-read string $type Type of the message origin, always “chat”
 * @property-read int $date Date the message was sent originally in Unix time
 * @property-read Chat $sender_chat Chat that sent the message originally
 * @property-read ?string $author_signature Optional. For messages originally sent by an anonymous chat administrator, original message author signature
 *
 * @see https://core.telegram.org/bots/api#messageoriginchat
 */
class MessageOriginChat extends MessageOrigin
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly Chat $sender_chat,
        public readonly ?string $author_signature,
    ) {
    }
}
