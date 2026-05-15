<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to remove up to 10000 recent reactions in a group or a supergroup chat added by a given user or chat. The bot must have the 'can_delete_messages' administrator right in the chat. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username
 * @property-read ?int $user_id Identifier of the user whose reactions will be removed, if the reactions were added by a user
 * @property-read ?int $actor_chat_id Identifier of the chat whose reactions will be removed, if the reactions were added by a chat
 *
 * @see https://core.telegram.org/bots/api#deleteallmessagereactions
 */
class DeleteAllMessageReactionsMethod extends TelegramMethod
{
    protected string $method = 'deleteAllMessageReactions';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?int $user_id,
        public readonly ?int $actor_chat_id,
    ) {
    }
}
