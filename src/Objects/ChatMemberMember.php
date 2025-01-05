<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that has no additional privileges or restrictions.
 *
 * @property string $status     The member's status in the chat, always “member”
 * @property User   $user       Information about the user
 * @property int    $until_date Optional. Date when the user's subscription will expire; Unix time
 */
class ChatMemberMember extends ChatMember
{
    protected $attributes = [
        'status' => 'string',
        'user' => 'User',
        'until_date' => 'integer',
    ];
}
