<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about the creation of a scheduled giveaway.
 *
 * @property int $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
 */
class GiveawayCreated extends TelegramObject
{
    protected $attributes = [
        'prize_star_count' => 'integer',
    ];
}
