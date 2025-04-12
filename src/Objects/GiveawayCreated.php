<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about the creation of a scheduled giveaway.
 * @property-read ?int $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
 *
 * @see https://core.telegram.org/bots/api#giveawaycreated
 */
class GiveawayCreated extends TelegramObject
{
    public function __construct(
        public readonly ?int $prize_star_count,
    ) {
    }
}
