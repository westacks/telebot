<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a video to be sent.
 * @property-read string $type Type of the result, must be video
 * @property-read string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @property-read ?string $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * @property-read ?string $cover Optional. Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @property-read ?int $start_timestamp Optional. Start timestamp for the video in the message
 * @property-read ?string $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property-read ?int $width Optional. Video width
 * @property-read ?int $height Optional. Video height
 * @property-read ?int $duration Optional. Video duration in seconds
 * @property-read ?bool $supports_streaming Optional. Pass True if the uploaded video is suitable for streaming
 * @property-read ?bool $has_spoiler Optional. Pass True if the video needs to be covered with a spoiler animation
 *
 * @see https://core.telegram.org/bots/api#inputmediavideo
 */
class InputMediaVideo extends InputMedia
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $thumbnail,
        public readonly ?string $cover,
        public readonly ?int $start_timestamp,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?int $width,
        public readonly ?int $height,
        public readonly ?int $duration,
        public readonly ?bool $supports_streaming,
        public readonly ?bool $has_spoiler,
    ) {
    }
}
