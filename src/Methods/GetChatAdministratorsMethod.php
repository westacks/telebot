<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get a list of administrators in a chat. Returns an Array of ChatMember objects.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel in the format @username
 * @property-read ?bool $return_bots Pass True to additionally receive all bots that are administrators of the chat. By default, bots other than the current bot are omitted.
 *
 * @see https://core.telegram.org/bots/api#getchatadministrators
 */
class GetChatAdministratorsMethod extends TelegramMethod
{
    protected string $method = 'getChatAdministrators';
    protected array $expect = ['ChatMember[]'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?bool $return_bots,
    ) {
    }
}
