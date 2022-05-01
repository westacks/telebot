<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about new members invited to a voice chat.
 *
 * @property User[] $users Optional. New members that were invited to the voice chat
 */
class VideoChatParticipantsInvited extends TelegramObject
{
    protected $attributes = [
        'users' => 'User[]',
    ];
}
