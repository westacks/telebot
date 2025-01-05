<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about the completion of a giveaway without public winners.
 *
 * @property int     $winner_count          Number of winners in the giveaway
 * @property int     $unclaimed_prize_count Optional. Number of undistributed prizes
 * @property Message $giveaway_message      Optional. Message with the giveaway that was completed, if it wasn't deleted
 * @property bool    $is_star_giveaway      Optional. True, if the giveaway is a Telegram Star giveaway. Otherwise, currently, the giveaway is a Telegram Premium giveaway.
 */
class GiveawayCompleted extends TelegramObject
{
    protected $attributes = [
        'winner_count' => 'integer',
        'unclaimed_prize_count' => 'integer',
        'giveaway_message' => 'Message',
        'is_star_giveaway' => 'boolean',
    ];
}
