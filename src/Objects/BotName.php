<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents the bot's name.
 *
 * @property string $name The bot's name
 */
class BotName extends TelegramObject
{
    protected $attributes = [
        'name' => 'string',
    ];
}
