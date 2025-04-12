<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
 * @property-read string $type Scope type, must be chat_administrators
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechatadministrators
 */
class BotCommandScopeChatAdministrators extends BotCommandScope
{
    public function __construct(
        public readonly string $type,
        public readonly int|string $chat_id,
    ) {
    }
}
