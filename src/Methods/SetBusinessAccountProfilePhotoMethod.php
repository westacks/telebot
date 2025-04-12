<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputProfilePhoto;

/**
 * Changes the profile photo of a managed business account. Requires the can_edit_profile_photo business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read InputProfilePhoto $photo The new profile photo to set
 * @property-read ?bool $is_public Pass True to set the public photo, which will be visible even if the main photo is hidden by the business account's privacy settings. An account can have only one public photo.
 *
 * @see https://core.telegram.org/bots/api#setbusinessaccountprofilephoto
 */
class SetBusinessAccountProfilePhotoMethod extends TelegramMethod
{
    protected string $method = 'setBusinessAccountProfilePhoto';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly InputProfilePhoto $photo,
        public readonly ?bool $is_public,
    ) {
    }
}
