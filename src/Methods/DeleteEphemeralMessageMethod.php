<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to delete an ephemeral message. Note that it is not guaranteed that the user will receive the message deletion event, especially if they are offline. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username
 * @property-read int $receiver_user_id Identifier of the user who received the message
 * @property-read int $ephemeral_message_id Identifier of the ephemeral message to delete
 *
 * @see https://core.telegram.org/bots/api#deleteephemeralmessage
 */
class DeleteEphemeralMessageMethod extends TelegramMethod
{
    protected string $method = 'deleteEphemeralMessage';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $receiver_user_id,
        public readonly int $ephemeral_message_id,
    ) {
    }
}
