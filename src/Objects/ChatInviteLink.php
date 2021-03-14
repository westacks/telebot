<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * Represents an invite link for a chat.
 *
 * @property string	        $invite_link        The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”.
 * @property User	        $creator            Creator of the link
 * @property boolean        $is_primary         True, if the link is primary
 * @property boolean        $is_revoked         True, if the link is revoked
 * @property integer        $expire_date        _Optional_. Point in time (Unix timestamp) when the link will expire or has been expired
 * @property integer        $member_limit	    _Optional_. Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * 
 */
class ChatInviteLink extends TelegramObject
{
    protected function relations()
    {
        return [
            'invite_link' => 'string',
            'creator' => User::class,
            'is_primary' => 'boolean',
            'is_revoked' => 'boolean',
            'expire_date' => 'integer',
            'member_limit' => 'integer',
        ];
    }
}
