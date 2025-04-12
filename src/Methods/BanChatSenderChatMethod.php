<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read int $sender_chat_id Unique identifier of the target sender chat
 *
 * @see https://core.telegram.org/bots/api#banchatsenderchat
 */
class BanChatSenderChatMethod extends TelegramMethod
{
    protected string $method = 'banChatSenderChat';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $sender_chat_id,
    ) {
    }
}
