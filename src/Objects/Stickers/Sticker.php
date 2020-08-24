<?php

namespace WeStacks\TeleBot\Objects\Stickers;

use WeStacks\TeleBot\Objects\TelegramObject;

/**
 * This object represents a sticker.
 * 
 * @property String                $file_id              Identifier for this file, which can be used to download or reuse the file
 * @property String                $file_unique_id       Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property Integer               $width                Sticker width
 * @property Integer               $height               Sticker height
 * @property Boolean               $is_animated          True, if the sticker is animated
 * @property PhotoSize             $thumb                _Optional_. Sticker thumbnail in the .WEBP or .JPG format
 * @property String                $emoji                _Optional_. Emoji associated with the sticker
 * @property String                $set_name             _Optional_. Name of the sticker set to which the sticker belongs
 * @property MaskPosition          $mask_position        _Optional_. For mask stickers, the position where the mask should be placed
 * @property Integer               $file_size            _Optional_. File size
 * 
 * @package WeStacks\TeleBot\Objects\Stickers
 */
class Sticker extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id'           => 'string',
            'file_unique_id'    => 'string',
            'width'             => 'integer',
            'height'            => 'integer',
            'is_animated'       => 'boolean',
            'thumb'             => PhotoSize::class,
            'emoji'             => 'string',
            'set_name'          => 'string',
            'mask_position'     => MaskPosition::class,
            'file_size'         => 'integer'
        ];
    }
}