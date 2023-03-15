<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that isn't currently a member of the chat, but may join it themselves.
 *
 * @property string $status The member's status in the chat, always “left”
 * @property User   $user   Information about the user
 */
class ChatMemberLeft extends ChatMember
{
    protected $attributes = [
        'status' => 'string',
        'user' => 'User',
    ];
}
