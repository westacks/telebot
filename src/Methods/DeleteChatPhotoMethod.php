<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 *
 * @see https://core.telegram.org/bots/api#deletechatphoto
 */
class DeleteChatPhotoMethod extends TelegramMethod
{
    protected string $method = 'deleteChatPhoto';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
