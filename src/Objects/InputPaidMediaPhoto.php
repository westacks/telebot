<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media to send is a photo.
 * @property-read string $type Type of the media, must be photo
 * @property-read string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 *
 * @see https://core.telegram.org/bots/api#inputpaidmediaphoto
 */
class InputPaidMediaPhoto extends InputPaidMedia
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
    ) {
    }
}
