<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the scope of bot commands, covering all private chats.
 * @property-read string $type Scope type, must be all_private_chats
 *
 * @see https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 */
class BotCommandScopeAllPrivateChats extends BotCommandScope
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
