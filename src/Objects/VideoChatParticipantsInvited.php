<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about new members invited to a video chat.
 * @property-read User[] $users New members that were invited to the video chat
 *
 * @see https://core.telegram.org/bots/api#videochatparticipantsinvited
 */
class VideoChatParticipantsInvited extends TelegramObject
{
    public function __construct(
        public readonly array $users,
    ) {
    }
}
