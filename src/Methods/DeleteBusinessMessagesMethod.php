<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Delete messages on behalf of a business account. Requires the can_delete_outgoing_messages business bot right to delete messages sent by the bot itself, or the can_delete_all_messages business bot right to delete any message. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection on behalf of which to delete the messages
 * @property-read int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages to delete. All messages must be from the same chat. See deleteMessage for limitations on which messages can be deleted
 *
 * @see https://core.telegram.org/bots/api#deletebusinessmessages
 */
class DeleteBusinessMessagesMethod extends TelegramMethod
{
    protected string $method = 'deleteBusinessMessages';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly array $message_ids,
    ) {
    }
}
