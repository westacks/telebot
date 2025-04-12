<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the number of members in a chat. Returns Int on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 * @see https://core.telegram.org/bots/api#getchatmembercount
 */
class GetChatMemberCountMethod extends TelegramMethod
{
    protected string $method = 'getChatMemberCount';
    protected array $expect = ['int'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
