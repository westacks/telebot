<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message will be pinned
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read int $message_id Identifier of a message to pin
 * @property-read ?bool $disable_notification Pass True if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.
 *
 * @see https://core.telegram.org/bots/api#pinchatmessage
 */
class PinChatMessageMethod extends TelegramMethod
{
    protected string $method = 'pinChatMessage';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly int $message_id,
        public readonly ?bool $disable_notification,
    ) {
    }
}
