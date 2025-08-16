<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a topic of a direct messages chat.
 * @property-read int $topic_id Unique identifier of the topic
 * @property-read ?User $user Optional. Information about the user that created the topic. Currently, it is always present
 *
 * @see https://core.telegram.org/bots/api#directmessagestopic
 */
class DirectMessagesTopic extends TelegramObject
{
    public function __construct(
        public readonly int $topic_id,
        public readonly ?User $user,
    ) {
    }
}
