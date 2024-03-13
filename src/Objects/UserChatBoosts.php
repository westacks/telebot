<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a list of boosts added to a chat by a user.
 *
 * @property ChatBoost[] $boosts The list of boosts added to the chat by the user
 */
class UserChatBoosts extends TelegramObject
{
    protected $attributes = [
        'boosts' => 'ChatBoost[]',
    ];
}
