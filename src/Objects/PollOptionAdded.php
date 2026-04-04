<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about an option added to a poll.
 * @property-read ?MaybeInaccessibleMessage $poll_message Optional. Message containing the poll to which the option was added, if known. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property-read string $option_persistent_id Unique identifier of the added option
 * @property-read string $option_text Option text
 * @property-read ?MessageEntity[] $option_text_entities Optional. Special entities that appear in the option_text
 *
 * @see https://core.telegram.org/bots/api#polloptionadded
 */
class PollOptionAdded extends TelegramObject
{
    public function __construct(
        public readonly ?MaybeInaccessibleMessage $poll_message,
        public readonly string $option_persistent_id,
        public readonly string $option_text,
        public readonly ?array $option_text_entities,
    ) {
    }
}
