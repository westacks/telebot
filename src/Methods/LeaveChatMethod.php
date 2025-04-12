<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 * @see https://core.telegram.org/bots/api#leavechat
 */
class LeaveChatMethod extends TelegramMethod
{
    protected string $method = 'leaveChat';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
