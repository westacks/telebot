<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property-read string $name New topic name, 1-128 characters
 *
 * @see https://core.telegram.org/bots/api#editgeneralforumtopic
 */
class EditGeneralForumTopicMethod extends TelegramMethod
{
    protected string $method = 'editGeneralForumTopic';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly string $name,
    ) {
    }
}
