<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The boost was obtained by the creation of a Telegram Premium giveaway. This boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * @property string $source                 Source of the boost, always “giveaway”
 * @property int    $giveaway_message_id    Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if the message isn't sent yet.
 * @property User   $user   	            Optional. User that won the prize in the giveaway if any
 * @property bool   $is_unclaimed           Optional. True, if the giveaway was completed, but there was no user to win the prize
 */
class ChatBoostSourceGiveaway extends ChatBoostSource
{
    protected $attributes = [
        'source' => 'string',
        'giveaway_message_id' => 'int',
        'user' => 'User',
        'is_unclaimed' => 'boolean',
    ];
}
