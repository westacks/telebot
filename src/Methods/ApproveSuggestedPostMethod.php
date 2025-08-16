<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to approve a suggested post in a direct messages chat. The bot must have the 'can_post_messages' administrator right in the corresponding channel chat. Returns True on success.
 *
 * @property-read int $chat_id Unique identifier for the target direct messages chat
 * @property-read int $message_id Identifier of a suggested post message to approve
 * @property-read ?int $send_date Point in time (Unix timestamp) when the post is expected to be published; omit if the date has already been specified when the suggested post was created. If specified, then the date must be not more than 2678400 seconds (30 days) in the future
 *
 * @see https://core.telegram.org/bots/api#approvesuggestedpost
 */
class ApproveSuggestedPostMethod extends TelegramMethod
{
    protected string $method = 'approveSuggestedPost';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $chat_id,
        public readonly int $message_id,
        public readonly ?int $send_date,
    ) {
    }
}
