<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all group and supergroup chats.
 *
 * @property string $type Scope type, must be all_group_chats
 */
class BotCommandScopeAllGroupChats extends BotCommandScope
{
    protected $attributes = [
        'type' => 'string',
    ];
}
