<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The message was originally sent to a channel chat.
 * @property-read string $type Type of the message origin, always “channel”
 * @property-read int $date Date the message was sent originally in Unix time
 * @property-read Chat $chat Channel chat to which the message was originally sent
 * @property-read int $message_id Unique message identifier inside the chat
 * @property-read ?string $author_signature Optional. Signature of the original post author
 *
 * @see https://core.telegram.org/bots/api#messageoriginchannel
 */
class MessageOriginChannel extends MessageOrigin
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly Chat $chat,
        public readonly int $message_id,
        public readonly ?string $author_signature,
    ) {
    }
}
