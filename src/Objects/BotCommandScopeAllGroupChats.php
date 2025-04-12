<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 * @property-read string $type Scope type, must be all_group_chats
 *
 * @see https://core.telegram.org/bots/api#botcommandscopeallgroupchats
 */
class BotCommandScopeAllGroupChats extends BotCommandScope
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
