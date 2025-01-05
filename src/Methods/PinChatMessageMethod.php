<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * @property string $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be pinned
 * @property string $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $message_id             __Required: Yes__. Identifier of a message to pin
 * @property bool   $disable_notification   __Required: Optional__. Pass True if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.
 */
class PinChatMessageMethod extends TelegramMethod
{
    protected string $method = 'pinChatMessage';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_id' => 'integer',
        'disable_notification' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
