<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically unhidden if it was hidden. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 * @see https://core.telegram.org/bots/api#reopengeneralforumtopic
 */
class ReopenGeneralForumTopicMethod extends TelegramMethod
{
    protected string $method = 'reopenGeneralForumTopic';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
