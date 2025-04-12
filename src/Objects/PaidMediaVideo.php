<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media is a video.
 * @property-read string $type Type of the paid media, always “video”
 * @property-read Video $video The video
 *
 * @see https://core.telegram.org/bots/api#paidmediavideo
 */
class PaidMediaVideo extends PaidMedia
{
    public function __construct(
        public readonly string $type,
        public readonly Video $video,
    ) {
    }
}
