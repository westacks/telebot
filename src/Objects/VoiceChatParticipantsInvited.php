<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a service message about new members invited to a voice chat.
 *
 * @property User[]    $duration       _Optional_. New members that were invited to the voice chat
 */
class VoiceChatParticipantsInvited extends TelegramObject
{
    protected function relations()
    {
        return [
            'users' => array(User::class),
        ];
    }
}
