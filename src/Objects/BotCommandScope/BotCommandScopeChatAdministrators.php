<?php

namespace WeStacks\TeleBot\Objects\BotCommandScope;

use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
 *
 * @property string $type       Scope type, must be chat_administrators
 * @property string $chat_id    Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 */
class BotCommandScopeChatAdministrators extends BotCommandScope
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'chat_id' => 'string'
        ];
    }
}
