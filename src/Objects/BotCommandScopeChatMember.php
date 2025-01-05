<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering a specific member of a group or supergroup chat.
 *
 * @property string $type    Scope type, must be chat_member
 * @property string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property int    $user_id Unique identifier of the target user
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    protected $attributes = [
        'type' => 'string',
        'chat_id' => 'string',
        'user_id' => 'integer',
    ];
}
