<?php

namespace WeStacks\TeleBot\Objects\Stickers;

use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\PhotoSize;

/**
 * This object represents a sticker set.
 *
 * @property string         $name           Sticker set name
 * @property string         $title          Sticker set title
 * @property bool           $is_animated    True, if the sticker set contains animated stickers
 * @property bool           $contains_masks True, if the sticker set contains masks
 * @property Array<Sticker> $stickers       List of all set stickers
 * @property PhotoSize      $thumb          _Optional_. Sticker set thumbnail in the .WEBP or .TGS format
 */
class StickerSet extends TelegramObject
{
    protected function relations()
    {
        return [
            'name' => 'string',
            'title' => 'string',
            'is_animated' => 'boolean',
            'contains_masks' => 'boolean',
            'stickers' => [Sticker::class],
            'thumb' => PhotoSize::class,
        ];
    }
}
