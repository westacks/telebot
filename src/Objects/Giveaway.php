<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a message about a scheduled giveaway.
 *
 * @property Chat[]   $chats                            The list of chats which the user must join to participate in the giveaway
 * @property int      $winners_selection_date           Point in time (Unix timestamp) when winners of the giveaway will be selected
 * @property int      $winner_count                     The number of users which are supposed to be selected as winners of the giveaway
 * @property bool     $only_new_members                 Optional. True, if only users who join the chats after the giveaway started should be eligible to win
 * @property bool     $has_public_winners               Optional. True, if the list of giveaway winners will be visible to everyone
 * @property string   $prize_description                Optional. Description of additional giveaway prize
 * @property string[] $country_codes                    Optional. A list of two-letter [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country codes indicating the countries from which eligible users for the giveaway must come. If empty, then all users can participate in the giveaway. Users with a phone number that was bought on Fragment can always participate in giveaways.
 * @property int      $prize_star_count                 Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
 * @property int      $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for; for Telegram Premium giveaways only
 */
class Giveaway extends TelegramObject
{
    protected $attributes = [
        'chats' => 'Chat[]',
        'winners_selection_date' => 'integer',
        'winner_count' => 'integer',
        'only_new_members' => 'boolean',
        'has_public_winners' => 'boolean',
        'prize_description' => 'string',
        'country_codes' => 'string[]',
        'prize_star_count' => 'integer',
        'premium_subscription_month_count' => 'integer',
    ];
}
