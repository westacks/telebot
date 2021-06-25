<?php

namespace WeStacks\TeleBot\Objects\BotCommandScope;

use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Represents the default scope of bot commands. Default commands are used if no commands with a narrower scope are specified for the user.
 *
 * @property string                 $type       Scope type, must be default
 */
class BotCommandScopeDefault extends BotCommandScope
{
    protected function relations()
    {
        return [
            'type' => 'string'
        ];
    }
}
