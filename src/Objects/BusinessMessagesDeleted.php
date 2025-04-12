<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object is received when messages are deleted from a connected business account.
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read Chat $chat Information about a chat in the business account. The bot may not have access to the chat or the corresponding user.
 * @property-read int[] $message_ids The list of identifiers of deleted messages in the chat of the business account
 *
 * @see https://core.telegram.org/bots/api#businessmessagesdeleted
 */
class BusinessMessagesDeleted extends TelegramObject
{
    public function __construct(
        public readonly string $business_connection_id,
        public readonly Chat $chat,
        public readonly array $message_ids,
    ) {
    }
}
