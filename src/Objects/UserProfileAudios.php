<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the audios displayed on a user's profile.
 * @property-read int $total_count Total number of profile audios for the target user
 * @property-read Audio[] $audios Requested profile audios
 *
 * @see https://core.telegram.org/bots/api#userprofileaudios
 */
class UserProfileAudios extends TelegramObject
{
    public function __construct(
        public readonly int $total_count,
        public readonly array $audios,
    ) {
    }
}
