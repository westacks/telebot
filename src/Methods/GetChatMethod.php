<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get up-to-date information about the chat. Returns a ChatFullInfo object on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 * @see https://core.telegram.org/bots/api#getchat
 */
class GetChatMethod extends TelegramMethod
{
    protected string $method = 'getChat';
    protected array $expect = ['ChatFullInfo'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
