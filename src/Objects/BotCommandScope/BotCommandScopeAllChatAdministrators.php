<?php

namespace WeStacks\TeleBot\Objects\BotCommandScope;

use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 *
 * @property string                 $type       Scope type, must be all_chat_administrators
 */
class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
    protected function relations()
    {
        return [
            'type' => 'string'
        ];
    }
}
