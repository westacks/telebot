<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A static profile photo in the .JPG format.
 * @property-read string $type Type of the profile photo, must be “static”
 * @property-read string $photo The static profile photo. Profile photos can't be reused and can only be uploaded as a new file, so you can pass “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 *
 * @see https://core.telegram.org/bots/api#inputprofilephotostatic
 */
class InputProfilePhotoStatic extends InputProfilePhoto
{
    public function __construct(
        public readonly string $type,
        public readonly string $photo,
    ) {
    }
}
