<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
 *
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ?int $offset Sequential number of the first photo to be returned. By default, all photos are returned.
 * @property-read ?int $limit Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 *
 * @see https://core.telegram.org/bots/api#getuserprofilephotos
 */
class GetUserProfilePhotosMethod extends TelegramMethod
{
    protected string $method = 'getUserProfilePhotos';
    protected array $expect = ['UserProfilePhotos'];

    public function __construct(
        public readonly int $user_id,
        public readonly ?int $offset,
        public readonly ?int $limit,
    ) {
    }
}
