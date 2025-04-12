<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a message about a scheduled giveaway.
 * @property-read Chat[] $chats The list of chats which the user must join to participate in the giveaway
 * @property-read int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway will be selected
 * @property-read int $winner_count The number of users which are supposed to be selected as winners of the giveaway
 * @property-read ?true $only_new_members Optional. True, if only users who join the chats after the giveaway started should be eligible to win
 * @property-read ?true $has_public_winners Optional. True, if the list of giveaway winners will be visible to everyone
 * @property-read ?string $prize_description Optional. Description of additional giveaway prize
 * @property-read ?string[] $country_codes Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which eligible users for the giveaway must come. If empty, then all users can participate in the giveaway. Users with a phone number that was bought on Fragment can always participate in giveaways.
 * @property-read ?int $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
 * @property-read ?int $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for; for Telegram Premium giveaways only
 *
 * @see https://core.telegram.org/bots/api#giveaway
 */
class Giveaway extends TelegramObject
{
    public function __construct(
        public readonly array $chats,
        public readonly int $winners_selection_date,
        public readonly int $winner_count,
        public readonly ?true $only_new_members,
        public readonly ?true $has_public_winners,
        public readonly ?string $prize_description,
        public readonly ?array $country_codes,
        public readonly ?int $prize_star_count,
        public readonly ?int $premium_subscription_month_count,
    ) {
    }
}
