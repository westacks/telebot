<?php

namespace WeStacks\TeleBot\Objects\BotCommandScope;

use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Represents the scope of bot commands, covering a specific chat.
 *
 * @property string $type       Scope type, must be chat
 * @property string $chat_id    Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 */
class BotCommandScopeChat extends BotCommandScope
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'chat_id' => 'string'
        ];
    }
}
