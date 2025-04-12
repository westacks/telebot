<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The boost was obtained by the creation of a Telegram Premium or a Telegram Star giveaway. This boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription for Telegram Premium giveaways and prize_star_count / 500 times for one year for Telegram Star giveaways.
 * @property-read string $source Source of the boost, always “giveaway”
 * @property-read int $giveaway_message_id Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if the message isn't sent yet.
 * @property-read ?User $user Optional. User that won the prize in the giveaway if any; for Telegram Premium giveaways only
 * @property-read ?int $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
 * @property-read ?true $is_unclaimed Optional. True, if the giveaway was completed, but there was no user to win the prize
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiveaway
 */
class ChatBoostSourceGiveaway extends ChatBoostSource
{
    public function __construct(
        public readonly string $source,
        public readonly int $giveaway_message_id,
        public readonly ?User $user,
        public readonly ?int $prize_star_count,
        public readonly ?true $is_unclaimed,
    ) {
    }
}
