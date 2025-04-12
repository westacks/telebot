<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about the completion of a giveaway without public winners.
 * @property-read int $winner_count Number of winners in the giveaway
 * @property-read ?int $unclaimed_prize_count Optional. Number of undistributed prizes
 * @property-read ?Message $giveaway_message Optional. Message with the giveaway that was completed, if it wasn't deleted
 * @property-read ?true $is_star_giveaway Optional. True, if the giveaway is a Telegram Star giveaway. Otherwise, currently, the giveaway is a Telegram Premium giveaway.
 *
 * @see https://core.telegram.org/bots/api#giveawaycompleted
 */
class GiveawayCompleted extends TelegramObject
{
    public function __construct(
        public readonly int $winner_count,
        public readonly ?int $unclaimed_prize_count,
        public readonly ?Message $giveaway_message,
        public readonly ?true $is_star_giveaway,
    ) {
    }
}
