<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Represents a join request sent to a chat.
 *
 * @property Chat           $chat        Chat to which the request was sent
 * @property User           $from        User that sent the join request
 * @property int            $date        Date the request was sent in Unix time
 * @property string         $bio         Optional. Bio of the user.
 * @property ChatInviteLink $invite_link Optional. Chat invite link that was used by the user to send the join request
 */
class ChatJoinRequest extends TelegramObject
{
    protected $attributes = [
        'chat' => 'Chat',
        'from' => 'User',
        'date' => 'integer',
        'bio' => 'string',
        'invite_link' => 'ChatInviteLink',
    ];
}
