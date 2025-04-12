<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the bot is an administrator in the chat. Returns a ChatMember object on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * @property-read int $user_id Unique identifier of the target user
 *
 * @see https://core.telegram.org/bots/api#getchatmember
 */
class GetChatMemberMethod extends TelegramMethod
{
    protected string $method = 'getChatMember';
    protected array $expect = ['ChatMember'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
    ) {
    }
}
