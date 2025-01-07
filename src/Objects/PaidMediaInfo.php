<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes the paid media added to a message.
 *
 * @property int         $star_count The number of Telegram Stars that must be paid to buy access to the media
 * @property PaidMedia[] $paid_media Information about the paid media
 */
class PaidMediaInfo extends TelegramObject
{
    protected $attributes = [
        'star_count' => 'integer',
        'paid_media' => 'PaidMedia[]',
    ];
}
