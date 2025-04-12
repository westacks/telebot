<?php

namespace WeStacks\TeleBot\Objects;

/**
 * An animated profile photo in the MPEG4 format.
 * @property-read string $type Type of the profile photo, must be “animated”
 * @property-read string $animation The animated profile photo. Profile photos can't be reused and can only be uploaded as a new file, so you can pass “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * @property-read ?float $main_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static profile photo. Defaults to 0.0.
 *
 * @see https://core.telegram.org/bots/api#inputprofilephotoanimated
 */
class InputProfilePhotoAnimated extends InputProfilePhoto
{
    public function __construct(
        public readonly string $type,
        public readonly string $animation,
        public readonly ?float $main_frame_timestamp,
    ) {
    }
}
