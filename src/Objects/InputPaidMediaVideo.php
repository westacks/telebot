<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media to send is a video.
 * @property-read string $type Type of the media, must be video
 * @property-read string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @property-read ?string $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * @property-read ?string $cover Optional. Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @property-read ?int $start_timestamp Optional. Start timestamp for the video in the message
 * @property-read ?int $width Optional. Video width
 * @property-read ?int $height Optional. Video height
 * @property-read ?int $duration Optional. Video duration in seconds
 * @property-read ?bool $supports_streaming Optional. Pass True if the uploaded video is suitable for streaming
 *
 * @see https://core.telegram.org/bots/api#inputpaidmediavideo
 */
class InputPaidMediaVideo extends InputPaidMedia
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $thumbnail,
        public readonly ?string $cover,
        public readonly ?int $start_timestamp,
        public readonly ?int $width,
        public readonly ?int $height,
        public readonly ?int $duration,
        public readonly ?bool $supports_streaming,
    ) {
    }
}
