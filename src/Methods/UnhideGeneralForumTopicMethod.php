<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 * @see https://core.telegram.org/bots/api#unhidegeneralforumtopic
 */
class UnhideGeneralForumTopicMethod extends TelegramMethod
{
    protected string $method = 'unhideGeneralForumTopic';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
