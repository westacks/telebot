<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property-read int $message_thread_id Unique identifier for the target message thread of the forum topic
 *
 * @see https://core.telegram.org/bots/api#unpinallforumtopicmessages
 */
class UnpinAllForumTopicMessagesMethod extends TelegramMethod
{
    protected string $method = 'unpinAllForumTopicMessages';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $message_thread_id,
    ) {
    }
}
