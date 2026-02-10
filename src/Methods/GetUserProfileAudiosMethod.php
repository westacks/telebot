<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get a list of profile audios for a user. Returns a UserProfileAudios object.
 *
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ?int $offset Sequential number of the first audio to be returned. By default, all audios are returned.
 * @property-read ?int $limit Limits the number of audios to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 *
 * @see https://core.telegram.org/bots/api#getuserprofileaudios
 */
class GetUserProfileAudiosMethod extends TelegramMethod
{
    protected string $method = 'getUserProfileAudios';
    protected array $expect = ['UserProfileAudios'];

    public function __construct(
        public readonly int $user_id,
        public readonly ?int $offset,
        public readonly ?int $limit,
    ) {
    }
}
