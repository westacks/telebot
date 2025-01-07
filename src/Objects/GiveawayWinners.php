<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a message about the completion of a giveaway with public winners.
 *
 * @property Chat   $chat                             The chat that created the giveaway
 * @property int    $giveaway_message_id              Identifier of the message with the giveaway in the chat
 * @property int    $winners_selection_date           Point in time (Unix timestamp) when winners of the giveaway were selected
 * @property int    $winner_count                     Total number of winners in the giveaway
 * @property User[] $winners                          List of up to 100 winners of the giveaway
 * @property int    $additional_chat_count            Optional. The number of other chats the user had to join in order to be eligible for the giveaway
 * @property int    $prize_star_count                 Optional. The number of Telegram Stars that were split between giveaway winners; for Telegram Star giveaways only
 * @property int    $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for; for Telegram Premium giveaways only
 * @property int    $unclaimed_prize_count            Optional. Number of undistributed prizes
 * @property bool   $only_new_members                 Optional. True, if only users who had joined the chats after the giveaway started were eligible to win
 * @property bool   $was_refunded                     Optional. True, if the giveaway was canceled because the payment for it was refunded
 * @property string $prize_description                Optional. Description of additional giveaway prize
 */
class GiveawayWinners extends TelegramObject
{
    protected $attributes = [
        'chat' => 'Chat',
        'giveaway_message_id' => 'integer',
        'winners_selection_date' => 'integer',
        'winner_count' => 'integer',
        'winners' => 'User[]',
        'additional_chat_count' => 'integer',
        'prize_star_count' => 'integer',
        'premium_subscription_month_count' => 'integer',
        'unclaimed_prize_count' => 'integer',
        'only_new_members' => 'boolean',
        'was_refunded' => 'boolean',
        'prize_description' => 'string',
    ];
}
