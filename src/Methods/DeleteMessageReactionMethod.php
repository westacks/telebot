<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to remove a reaction from a message in a group or a supergroup chat. The bot must have the 'can_delete_messages' administrator right in the chat. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username
 * @property-read int $message_id Identifier of the target message
 * @property-read ?int $user_id Identifier of the user whose reaction will be removed, if the reaction was added by a user
 * @property-read ?int $actor_chat_id Identifier of the chat whose reaction will be removed, if the reaction was added by a chat
 *
 * @see https://core.telegram.org/bots/api#deletemessagereaction
 */
class DeleteMessageReactionMethod extends TelegramMethod
{
    protected string $method = 'deleteMessageReaction';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $message_id,
        public readonly ?int $user_id,
        public readonly ?int $actor_chat_id,
    ) {
    }
}
