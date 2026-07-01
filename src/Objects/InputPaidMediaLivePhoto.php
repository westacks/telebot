<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media to send is a live photo.
 * @property-read string $type Type of the media, must be live_photo
 * @property-read string $media Video of the live photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended) or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files ». Sending live photos by a URL is currently unsupported.
 * @property-read string $photo The static photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended) or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files ». Sending live photos by a URL is currently unsupported.
 *
 * @see https://core.telegram.org/bots/api#inputpaidmedialivephoto
 */
class InputPaidMediaLivePhoto extends InputPaidMedia
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly string $photo,
    ) {
    }
}
