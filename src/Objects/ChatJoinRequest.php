<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Represents a join request sent to a chat.
 *
 * @property Chat           $chat         Chat to which the request was sent
 * @property User           $from         User that sent the join request
 * @property int            $user_chat_id Identifier of a private chat with the user who sent the join request. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot can use this identifier for 5 minutes to send messages until the join request is processed, assuming no other administrator contacted the user.
 * @property int            $date         Date the request was sent in Unix time
 * @property string         $bio          Optional. Bio of the user.
 * @property ChatInviteLink $invite_link  Optional. Chat invite link that was used by the user to send the join request
 */
class ChatJoinRequest extends TelegramObject
{
    protected $attributes = [
        'chat' => 'Chat',
        'from' => 'User',
        'user_chat_id' => 'integer',
        'date' => 'integer',
        'bio' => 'string',
        'invite_link' => 'ChatInviteLink',
    ];
}
