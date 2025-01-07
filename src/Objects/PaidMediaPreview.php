<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media isn't available before the payment.
 *
 * @property string $type     Type of the paid media, always “preview”
 * @property int    $width    Optional. Media width as defined by the sender
 * @property int    $height   Optional. Media height as defined by the sender
 * @property int    $duration Optional. Duration of the media in seconds as defined by the sender
 */
class PaidMediaPreview extends PaidMedia
{
    protected $attributes = [
        'type' => 'string',
        'width' => 'integer',
        'height' => 'integer',
        'duration' => 'integer',
    ];
}
