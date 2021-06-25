<?php

namespace WeStacks\TeleBot\Objects\BotCommandScope;

use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 *
 * @property string                 $type       Scope type, must be all_group_chats
 */
class BotCommandScopeAllGroupChats extends BotCommandScope
{
    protected function relations()
    {
        return [
            'type' => 'string'
        ];
    }
}
