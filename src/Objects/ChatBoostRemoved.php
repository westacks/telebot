<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a boost removed from a chat.
 *
 * @property Chat            $chat           Chat to which the request was sent
 * @property string          $boost_id       Unique identifier of the boost
 * @property int             $remove_date    Point in time (Unix timestamp) when the boost was removed
 * @property ChatBoostSource $source         Source of the removed boost
 */
class ChatBoostRemoved extends TelegramObject
{
    protected $attributes = [
        'chat' => 'Chat',
        'boost_id' => 'string',
        'remove_date' => 'integer',
        'source' => 'ChatBoostSource',
    ];
}
