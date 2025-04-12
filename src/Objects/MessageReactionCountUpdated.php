<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents reaction changes on a message with anonymous reactions.
 * @property-read Chat $chat The chat containing the message
 * @property-read int $message_id Unique message identifier inside the chat
 * @property-read int $date Date of the change in Unix time
 * @property-read ReactionCount[] $reactions List of reactions that are present on the message
 *
 * @see https://core.telegram.org/bots/api#messagereactioncountupdated
 */
class MessageReactionCountUpdated extends TelegramObject
{
    public function __construct(
        public readonly Chat $chat,
        public readonly int $message_id,
        public readonly int $date,
        public readonly array $reactions,
    ) {
    }
}
