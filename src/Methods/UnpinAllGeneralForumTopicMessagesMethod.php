<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 * @see https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages
 */
class UnpinAllGeneralForumTopicMessagesMethod extends TelegramMethod
{
    protected string $method = 'unpinAllGeneralForumTopicMessages';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
