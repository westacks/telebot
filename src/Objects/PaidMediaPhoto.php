<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media is a photo.
 *
 * @property string      $type  Type of the paid media, always “photo”
 * @property PhotoSize[] $photo The photo
 */
class PaidMediaPhoto extends PaidMedia
{
    protected $attributes = [
        'type' => 'string',
        'photo' => 'PhotoSize[]',
    ];
}
