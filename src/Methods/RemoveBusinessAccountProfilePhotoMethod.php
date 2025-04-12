<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Removes the current profile photo of a managed business account. Requires the can_edit_profile_photo business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read ?bool $is_public Pass True to remove the public photo, which is visible even if the main photo is hidden by the business account's privacy settings. After the main photo is removed, the previous profile photo (if present) becomes the main photo.
 *
 * @see https://core.telegram.org/bots/api#removebusinessaccountprofilephoto
 */
class RemoveBusinessAccountProfilePhotoMethod extends TelegramMethod
{
    protected string $method = 'removeBusinessAccountProfilePhoto';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly ?bool $is_public,
    ) {
    }
}
