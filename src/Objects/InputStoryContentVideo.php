<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a video to post as a story.
 * @property-read string $type Type of the content, must be “video”
 * @property-read string $video The video to post as a story. The video must be of the size 720x1280, streamable, encoded with H.265 codec, with key frames added each second in the MPEG4 format, and must not exceed 30 MB. The video can't be reused and can only be uploaded as a new file, so you can pass “attach://<file_attach_name>” if the video was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * @property-read ?float $duration Optional. Precise duration of the video in seconds; 0-60
 * @property-read ?float $cover_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static cover for the story. Defaults to 0.0.
 * @property-read ?bool $is_animation Optional. Pass True if the video has no sound
 *
 * @see https://core.telegram.org/bots/api#inputstorycontentvideo
 */
class InputStoryContentVideo extends InputStoryContent
{
    public function __construct(
        public readonly string $type,
        public readonly string $video,
        public readonly ?float $duration,
        public readonly ?float $cover_frame_timestamp,
        public readonly ?bool $is_animation,
    ) {
    }
}
