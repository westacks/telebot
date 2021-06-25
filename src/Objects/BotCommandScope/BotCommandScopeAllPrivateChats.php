<?php

namespace WeStacks\TeleBot\Objects\BotCommandScope;

use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Represents the scope of bot commands, covering all private chats.
 *
 * @property string                 $type       Scope type, must be all_private_chats
 */
class BotCommandScopeAllPrivateChats extends BotCommandScope
{
    protected function relations()
    {
        return [
            'type' => 'string'
        ];
    }
}
