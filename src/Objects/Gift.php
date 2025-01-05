<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a gift that can be sent by the bot.
 *
 * @property string  $id                 Unique identifier of the gift
 * @property Sticker $sticker            The sticker that represents the gift
 * @property int     $star_count         The number of Telegram Stars that must be paid to send the sticker
 * @property int     $upgrade_star_count Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique one
 * @property int     $total_count        Optional. The total number of the gifts of this type that can be sent; for limited gifts only
 * @property int     $remaining_count    Optional. The number of remaining gifts of this type that can be sent; for limited gifts only
 */
class Gift extends TelegramObject
{
    protected $attributes = [
        'id' => 'string',
        'sticker' => 'Sticker',
        'star_count' => 'integer',
        'upgrade_star_count' => 'integer',
        'total_count' => 'integer',
        'remaining_count' => 'integer',
    ];
}
