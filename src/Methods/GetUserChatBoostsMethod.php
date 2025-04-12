<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the list of boosts added to a chat by a user. Requires administrator rights in the chat. Returns a UserChatBoosts object.
 *
 * @property-read int|string $chat_id Unique identifier for the chat or username of the channel (in the format @channelusername)
 * @property-read int $user_id Unique identifier of the target user
 *
 * @see https://core.telegram.org/bots/api#getuserchatboosts
 */
class GetUserChatBoostsMethod extends TelegramMethod
{
    protected string $method = 'getUserChatBoosts';
    protected array $expect = ['UserChatBoosts'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
    ) {
    }
}
