<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a topic of a direct messages chat.
 * @property-read int $topic_id Unique identifier of the topic. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
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
