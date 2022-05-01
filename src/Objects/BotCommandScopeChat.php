<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering a specific chat.
 *
 * @property string $type    Scope type, must be chat
 * @property string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 */
class BotCommandScopeChat extends BotCommandScope
{
    protected $attributes = [
        'type' => 'string',
        'chat_id' => 'string',
    ];
}
