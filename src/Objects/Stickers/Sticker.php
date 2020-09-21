<?php

namespace WeStacks\TeleBot\Objects\Stickers;

use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\PhotoSize;

/**
 * This object represents a sticker.
 *
 * @property string       $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string       $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int          $width          Sticker width
 * @property int          $height         Sticker height
 * @property bool         $is_animated    True, if the sticker is animated
 * @property PhotoSize    $thumb          _Optional_. Sticker thumbnail in the .WEBP or .JPG format
 * @property string       $emoji          _Optional_. Emoji associated with the sticker
 * @property string       $set_name       _Optional_. Name of the sticker set to which the sticker belongs
 * @property MaskPosition $mask_position  _Optional_. For mask stickers, the position where the mask should be placed
 * @property int          $file_size      _Optional_. File size
 */
class Sticker extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'width' => 'integer',
            'height' => 'integer',
            'is_animated' => 'boolean',
            'thumb' => PhotoSize::class,
            'emoji' => 'string',
            'set_name' => 'string',
            'mask_position' => MaskPosition::class,
            'file_size' => 'integer',
        ];
    }
}
