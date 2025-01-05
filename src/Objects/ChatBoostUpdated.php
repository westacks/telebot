<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a boost added to a chat or changed.
 *
 * @property Chat      $chat  Chat which was boosted
 * @property ChatBoost $boost Information about the chat boost
 */
class ChatBoostUpdated extends TelegramObject
{
    protected $attributes = [
        'chat' => 'Chat',
        'boost' => 'ChatBoost',
    ];
}
