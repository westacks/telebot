<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a bot command.
 *
 * @property string $command     Text of the command, 1-32 characters. Can contain only lowercase English letters, digits and underscores.
 * @property string $description Description of the command, 3-256 characters.
 */
class BotCommand extends TelegramObject
{
    protected function relations()
    {
        return [
            'command' => 'string',
            'description' => 'string',
        ];
    }
}
