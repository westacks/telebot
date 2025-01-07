<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a service message about new members invited to a video chat.
 *
 * @property User[] $users New members that were invited to the video chat
 */
class VideoChatParticipantsInvited extends TelegramObject
{
    protected $attributes = [
        'users' => 'User[]',
    ];
}
