<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents changes in the status of a chat member.
 *
 * @property Chat	            $chat	            Chat the user belongs to
 * @property User	            $from	            Performer of the action, which resulted in the change
 * @property Integer            $date	            Date the change was done in Unix time
 * @property ChatMember	        $old_chat_member	Previous information about the chat member
 * @property ChatMember	        $new_chat_member	New information about the chat member
 * @property ChatInviteLink	    $invite_link	    _Optional_. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
 */
class ChatMemberUpdated extends TelegramObject
{
    protected function relations()
    {
        return [
            'chat' => Chat::class,
            'from' => User::class,
            'date' => 'integer',
            'old_chat_member' => ChatMember::class,
            'new_chat_member' => ChatMember::class,
            'invite_link' => ChatInviteLink::class,
        ];
    }
}
