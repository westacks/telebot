<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents the bot's short description.
 *
 * @property string $short_description The bot's short description
 */
class BotShortDescription extends TelegramObject
{
    protected $attributes = [
        'short_description' => 'string',
    ];
}
