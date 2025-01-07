<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 *
 * @property string $source Source of the boost, always “premium”
 * @property User   $user   User that boosted the chat
 */
class ChatBoostSourcePremium extends ChatBoostSource
{
    protected $attributes = [
        'source' => 'string',
        'user' => 'User',
    ];
}
