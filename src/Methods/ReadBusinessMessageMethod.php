<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Marks incoming message as read on behalf of a business account. Requires the can_read_messages business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection on behalf of which to read the message
 * @property-read int $chat_id Unique identifier of the chat in which the message was received. The chat must have been active in the last 24 hours.
 * @property-read int $message_id Unique identifier of the message to mark as read
 *
 * @see https://core.telegram.org/bots/api#readbusinessmessage
 */
class ReadBusinessMessageMethod extends TelegramMethod
{
    protected string $method = 'readBusinessMessage';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly int $chat_id,
        public readonly int $message_id,
    ) {
    }
}
