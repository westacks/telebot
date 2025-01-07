<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains information about a chat boost.
 *
 * @property string                                                                 $boost_id        Unique identifier of the boost
 * @property int                                                                    $add_date        Point in time (Unix timestamp) when the chat was boosted
 * @property int                                                                    $expiration_date Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium subscription is prolonged
 * @property ChatBoostSourceGiftCode|ChatBoostSourceGiveaway|ChatBoostSourcePremium $source          Source of the added boost
 */
class ChatBoost extends TelegramObject
{
    protected $attributes = [
        'boost_id' => 'string',
        'add_date' => 'integer',
        'expiration_date' => 'integer',
        'source' => 'ChatBoostSource',
    ];
}
