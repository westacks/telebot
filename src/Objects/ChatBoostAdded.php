<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about a user boosting a chat.
 *
 * @property int $boost_count Number of boosts added by the user
 */
class ChatBoostAdded extends TelegramObject
{
    protected $attributes = [
        'boost_count' => 'integer',
    ];
}
