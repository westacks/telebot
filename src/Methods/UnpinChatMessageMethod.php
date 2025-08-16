<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to remove a message from the list of pinned messages in a chat. In private chats and channel direct messages chats, all messages can be unpinned. Conversely, the bot must be an administrator with the 'can_pin_messages' right or the 'can_edit_messages' right to unpin messages in groups and channels respectively. Returns True on success.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message will be unpinned
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_id Identifier of the message to unpin. Required if business_connection_id is specified. If not specified, the most recent pinned message (by sending date) will be unpinned.
 *
 * @see https://core.telegram.org/bots/api#unpinchatmessage
 */
class UnpinChatMessageMethod extends TelegramMethod
{
    protected string $method = 'unpinChatMessage';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly ?int $message_id,
    ) {
    }
}
