<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all private chats.
 *
 * @property string $type Scope type, must be all_private_chats
 */
class BotCommandScopeAllPrivateChats extends BotCommandScope
{
    protected $attributes = [
        'type' => 'string',
    ];
}
