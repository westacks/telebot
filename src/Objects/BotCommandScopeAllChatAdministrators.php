<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 * @property-read string $type Scope type, must be all_chat_administrators
 *
 * @see https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
 */
class BotCommandScopeAllChatAdministrators extends TelegramObject
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
