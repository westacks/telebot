<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents the bot's description.
 *
 * @property string $description The bot's description
 */
class BotDescription extends TelegramObject
{
    protected $attributes = [
        'description' => 'string',
    ];
}
