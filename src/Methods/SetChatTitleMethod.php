<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read string $title New chat title, 1-128 characters
 *
 * @see https://core.telegram.org/bots/api#setchattitle
 */
class SetChatTitleMethod extends TelegramMethod
{
    protected string $method = 'setChatTitle';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly string $title,
    ) {
    }
}
