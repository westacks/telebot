<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a sticker set.
 *
 * @property string    $name           Sticker set name
 * @property string    $title          Sticker set title
 * @property bool      $is_animated    True, if the sticker set contains animated stickers
 * @property bool      $is_video       True, if the sticker set contains [video stickers](https://telegram.org/blog/video-stickers-better-reactions)
 * @property bool      $contains_masks True, if the sticker set contains masks
 * @property Sticker[] $stickers       List of all set stickers
 * @property PhotoSize $thumb          Optional. Sticker set thumbnail in the .WEBP or .TGS format
 */
class StickerSet extends TelegramObject
{
    protected $attributes = [
        'name'           => 'string',
        'title'          => 'string',
        'is_animated'    => 'boolean',
        'is_video'       => 'boolean',
        'contains_masks' => 'boolean',
        'stickers'       => 'Sticker[]',
        'thumb'          => 'PhotoSize',
    ];
}
