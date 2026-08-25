<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a chat or a bot being added to a community.
 * @property-read Community $community The new community to which the chat or the bot belongs
 *
 * @see https://core.telegram.org/bots/api#communitychatadded
 */
class CommunityChatAdded extends TelegramObject
{
    public function __construct(
        public readonly Community $community,
    ) {
    }
}
