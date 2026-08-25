<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a chat being joined by a user from a community.
 * @property-read Community $community The community from which the chat was joined
 *
 * @see https://core.telegram.org/bots/api#communitychatjoined
 */
class CommunityChatJoined extends TelegramObject
{
    public function __construct(
        public readonly Community $community,
    ) {
    }
}
