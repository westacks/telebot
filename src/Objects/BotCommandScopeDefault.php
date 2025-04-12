<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the default scope of bot commands. Default commands are used if no commands with a narrower scope are specified for the user.
 * @property-read string $type Scope type, must be default
 *
 * @see https://core.telegram.org/bots/api#botcommandscopedefault
 */
class BotCommandScopeDefault extends BotCommandScope
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
