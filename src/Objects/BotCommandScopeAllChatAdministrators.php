<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all group and supergroup chat administrators.
 *
 * @property string $type Scope type, must be all_chat_administrators
 */
class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
    protected $attributes = [
        'type' => 'string',
    ];
}
