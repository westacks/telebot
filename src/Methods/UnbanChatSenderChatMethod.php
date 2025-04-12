<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read int $sender_chat_id Unique identifier of the target sender chat
 *
 * @see https://core.telegram.org/bots/api#unbanchatsenderchat
 */
class UnbanChatSenderChatMethod extends TelegramMethod
{
    protected string $method = 'unbanChatSenderChat';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $sender_chat_id,
    ) {
    }
}
