<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a sticker.
 *
 * @property string       $file_id           Identifier for this file, which can be used to download or reuse the file
 * @property string       $file_unique_id    Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property string       $type              Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
 * @property int          $width             Sticker width
 * @property int          $height            Sticker height
 * @property bool         $is_animated       True, if the sticker is [animated](https://telegram.org/blog/animated-stickers)
 * @property bool         $is_video          True, if the sticker is a [video sticker](https://telegram.org/blog/video-stickers-better-reactions)
 * @property PhotoSize    $thumbnail         Optional. Sticker thumbnail in the .WEBP or .JPG format
 * @property string       $emoji             Optional. Emoji associated with the sticker
 * @property string       $set_name          Optional. Name of the sticker set to which the sticker belongs
 * @property File         $premium_animation Optional. For premium regular stickers, premium animation for the sticker
 * @property MaskPosition $mask_position     Optional. For mask stickers, the position where the mask should be placed
 * @property string       $custom_emoji_id   Optional. For custom emoji stickers, unique identifier of the custom emoji
 * @property bool         $needs_repainting  Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
 * @property int          $file_size         Optional. File size in bytes
 */
class Sticker extends TelegramObject
{
    protected $attributes = [
        'file_id' => 'string',
        'file_unique_id' => 'string',
        'type' => 'string',
        'width' => 'integer',
        'height' => 'integer',
        'is_animated' => 'boolean',
        'is_video' => 'boolean',
        'thumbnail' => 'PhotoSize',
        'emoji' => 'string',
        'set_name' => 'string',
        'premium_animation' => 'File',
        'mask_position' => 'MaskPosition',
        'custom_emoji_id' => 'string',
        'needs_repainting' => 'boolean',
        'file_size' => 'integer',
    ];
}
