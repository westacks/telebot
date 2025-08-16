<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to decline a suggested post in a direct messages chat. The bot must have the 'can_manage_direct_messages' administrator right in the corresponding channel chat. Returns True on success.
 *
 * @property-read int $chat_id Unique identifier for the target direct messages chat
 * @property-read int $message_id Identifier of a suggested post message to decline
 * @property-read ?string $comment Comment for the creator of the suggested post; 0-128 characters
 *
 * @see https://core.telegram.org/bots/api#declinesuggestedpost
 */
class DeclineSuggestedPostMethod extends TelegramMethod
{
    protected string $method = 'declineSuggestedPost';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $chat_id,
        public readonly int $message_id,
        public readonly ?string $comment,
    ) {
    }
}
