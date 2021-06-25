<?php

namespace WeStacks\TeleBot\Objects\BotCommandScope;

use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 *
 * @property string $type       Scope type, must be chat_member
 * @property string $chat_id    Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property string $user_id    Unique identifier of the target user
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'chat_id' => 'string',
            'user_id' => 'integer'
        ];
    }
}
