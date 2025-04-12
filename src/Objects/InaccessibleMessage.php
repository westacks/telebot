<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 * @property-read Chat $chat Chat the message belonged to
 * @property-read int $message_id Unique message identifier inside the chat
 * @property-read int $date Always 0. The field can be used to differentiate regular and inaccessible messages.
 *
 * @see https://core.telegram.org/bots/api#inaccessiblemessage
 */
class InaccessibleMessage extends MaybeInaccessibleMessage
{
    public function __construct(
        public readonly Chat $chat,
        public readonly int $message_id,
        public readonly int $date,
    ) {
    }
}
