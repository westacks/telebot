<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the last messages from the personal chat (i.e., the chat currently added to their profile) of a given user. On success, an Array of Message objects is returned.
 *
 * @property-read int $user_id Unique identifier for the target user
 * @property-read int $limit The maximum number of messages to return; 1-20
 *
 * @see https://core.telegram.org/bots/api#getuserpersonalchatmessages
 */
class GetUserPersonalChatMessagesMethod extends TelegramMethod
{
    protected string $method = 'getUserPersonalChatMessages';
    protected array $expect = ['Message[]'];

    public function __construct(
        public readonly int $user_id,
        public readonly int $limit,
    ) {
    }
}
