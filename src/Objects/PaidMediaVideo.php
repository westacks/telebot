<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media is a video.
 *
 * @property string $type  Type of the paid media, always “video”
 * @property Video  $video The video
 */
class PaidMediaVideo extends PaidMedia
{
    protected $attributes = [
        'type' => 'string',
        'video' => 'Video',
    ];
}
