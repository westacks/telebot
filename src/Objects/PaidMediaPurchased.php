<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains information about a paid media purchase.
 *
 * @property User   $from               User who purchased the media
 * @property string $paid_media_payload Bot-specified paid media payload
 */
class PaidMediaPurchased extends TelegramObject
{
    protected $attributes = [
        'from' => 'User',
        'paid_media_payload' => 'string',
    ];
}
