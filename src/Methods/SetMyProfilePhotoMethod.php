<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputProfilePhoto;

/**
 * Changes the profile photo of the bot. Returns True on success.
 *
 * @property-read InputProfilePhoto $photo The new profile photo to set
 *
 * @see https://core.telegram.org/bots/api#setmyprofilephoto
 */
class SetMyProfilePhotoMethod extends TelegramMethod
{
    protected string $method = 'setMyProfilePhoto';
    protected array $expect = ['true'];

    public function __construct(
        public readonly InputProfilePhoto $photo,
    ) {
    }
}
