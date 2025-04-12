<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 * @see https://core.telegram.org/bots/api#getchatadministrators
 */
class GetChatAdministratorsMethod extends TelegramMethod
{
    protected string $method = 'getChatAdministrators';
    protected array $expect = ['ChatMember[]'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
