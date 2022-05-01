<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\MaskPosition;

/**
 * Use this method to add a new sticker to a set created by the bot. You must use exactly one of the fields png_sticker or tgs_sticker. Animated stickers can be added to animated sticker sets and only to them. Animated sticker sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers. Returns True on success.
 *
 * @property int          $user_id       __Required: Yes__. User identifier of sticker set owner
 * @property string       $name          __Required: Yes__. Sticker set name
 * @property InputFile    $png_sticker   __Required: Optional__. PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either width or height must be exactly 512px. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
 * @property InputFile    $tgs_sticker   __Required: Optional__. TGS animation with the sticker, uploaded using multipart/form-data. See https://core.telegram.org/animated_stickers#technical-requirements for technical requirements
 * @property InputFile    $webm_sticker  __Required: Optional__. WEBM video with the sticker, uploaded using multipart/form-data. See https://core.telegram.org/stickers#video-sticker-requirements for technical requirements
 * @property string       $emojis        __Required: Yes__. One or more emoji corresponding to the sticker
 * @property MaskPosition $mask_position __Required: Optional__. A JSON-serialized object for position where the mask should be placed on faces
 */
class AddStickerToSetMethod extends TelegramMethod
{
    protected string $method = 'addStickerToSet';

    protected string $expect = 'File';

    protected array $parameters = [
        'user_id' => 'string',
        'name' => 'string',
        'png_sticker' => 'InputFile',
        'tgs_sticker' => 'InputFile',
        'webm_sticker' => 'InputFile',
        'emojis' => 'string',
        'mask_position' => 'MaskPosition',
    ];
}
