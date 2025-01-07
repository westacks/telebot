<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a sticker set.
 *
 * @property string    $name         Sticker set name
 * @property string    $title        Sticker set title
 * @property string    $sticker_type Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
 * @property Sticker[] $stickers     List of all set stickers
 * @property PhotoSize $thumbnail    Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
 */
class StickerSet extends TelegramObject
{
    protected $attributes = [
        'name' => 'string',
        'title' => 'string',
        'sticker_type' => 'string',
        'stickers' => 'Sticker[]',
        'thumbnail' => 'PhotoSize',
    ];
}
