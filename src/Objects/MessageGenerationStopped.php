<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes an update about a user stopping message generation.
 * @property-read Chat $chat Chat in which the message is generated
 * @property-read ?int $message_thread_id Optional. Unique identifier of the message thread in which the message is generated
 * @property-read int $draft_id Unique identifier of the message draft which was stopped
 *
 * @see https://core.telegram.org/bots/api#messagegenerationstopped
 */
class MessageGenerationStopped extends TelegramObject
{
    public function __construct(
        public readonly Chat $chat,
        public readonly ?int $message_thread_id,
        public readonly int $draft_id,
    ) {
    }
}
