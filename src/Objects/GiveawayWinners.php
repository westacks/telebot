<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a message about the completion of a giveaway with public winners.
 * @property-read Chat $chat The chat that created the giveaway
 * @property-read int $giveaway_message_id Identifier of the message with the giveaway in the chat
 * @property-read int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway were selected
 * @property-read int $winner_count Total number of winners in the giveaway
 * @property-read User[] $winners List of up to 100 winners of the giveaway
 * @property-read ?int $additional_chat_count Optional. The number of other chats the user had to join in order to be eligible for the giveaway
 * @property-read ?int $prize_star_count Optional. The number of Telegram Stars that were split between giveaway winners; for Telegram Star giveaways only
 * @property-read ?int $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for; for Telegram Premium giveaways only
 * @property-read ?int $unclaimed_prize_count Optional. Number of undistributed prizes
 * @property-read ?true $only_new_members Optional. True, if only users who had joined the chats after the giveaway started were eligible to win
 * @property-read ?true $was_refunded Optional. True, if the giveaway was canceled because the payment for it was refunded
 * @property-read ?string $prize_description Optional. Description of additional giveaway prize
 *
 * @see https://core.telegram.org/bots/api#giveawaywinners
 */
class GiveawayWinners extends TelegramObject
{
    public function __construct(
        public readonly Chat $chat,
        public readonly int $giveaway_message_id,
        public readonly int $winners_selection_date,
        public readonly int $winner_count,
        public readonly array $winners,
        public readonly ?int $additional_chat_count,
        public readonly ?int $prize_star_count,
        public readonly ?int $premium_subscription_month_count,
        public readonly ?int $unclaimed_prize_count,
        public readonly ?true $only_new_members,
        public readonly ?true $was_refunded,
        public readonly ?string $prize_description,
    ) {
    }
}
