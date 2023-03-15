<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a sticker set.
 *
 * @property string    $name           Sticker set name
 * @property string    $title          Sticker set title
 * @property string    $sticker_type   Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
 * @property bool      $is_animated    True, if the sticker set contains animated stickers
 * @property bool      $is_video       True, if the sticker set contains [video stickers](https://telegram.org/blog/video-stickers-better-reactions)
 * @property Sticker[] $stickers       List of all set stickers
 * @property PhotoSize $thumbnail      Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
 */
class StickerSet extends TelegramObject
{
    protected $attributes = [
        'name' => 'string',
        'title' => 'string',
        'sticker_type' => 'string',
        'is_animated' => 'boolean',
        'is_video' => 'boolean',
        'contains_masks' => 'boolean', // DEPRECATED
        'stickers' => 'Sticker[]',
        'thumbnail' => 'PhotoSize',
    ];
}
