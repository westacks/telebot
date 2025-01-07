<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to delete a message, including service messages, with the following limitations: - A message can only be deleted if it was sent less than 48 hours ago. - Service messages about a supergroup, channel, or forum topic creation can't be deleted. - A dice message in a private chat can only be deleted if it was sent more than 24 hours ago. - Bots can delete outgoing messages in private chats, groups, and supergroups. - Bots can delete incoming messages in private chats. - Bots granted can_post_messages permissions can delete outgoing messages in channels. - If the bot is an administrator of a group, it can delete any message there. - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there. Returns True on success.
 *
 * @property string $chat_id    __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $message_id __Required: Yes__. Identifier of the message to delete
 */
class DeleteMessageMethod extends TelegramMethod
{
    protected string $method = 'deleteMessage';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_id' => 'integer',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
