<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * @property string $source Source of the boost, always “gift_code”
 * @property User   $user   User for which the gift code was created
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
{
    protected $attributes = [
        'source' => 'string',
        'user' => 'User',
    ];
}
