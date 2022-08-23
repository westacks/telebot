<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\File;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\MaskPosition;

/**
 * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. You must use exactly one of the fields png_sticker or tgs_sticker. Returns True on success.
 *
 * @property int          $user_id        __Required: Yes__. User identifier of created sticker set owner
 * @property string       $name           __Required: Yes__. Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only english letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in “_by_”.  is case insensitive. 1-64 characters.
 * @property string       $title          __Required: Yes__. Sticker set title, 1-64 characters
 * @property InputFile    $png_sticker    __Required: Optional__. PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either width or height must be exactly 512px. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
 * @property InputFile    $tgs_sticker    __Required: Optional__. TGS animation with the sticker, uploaded using multipart/form-data. See https://core.telegram.org/animated_stickers#technical-requirements for technical requirements
 * @property InputFile    $webm_sticker   __Required: Optional__. WEBM video with the sticker, uploaded using multipart/form-data. See https://core.telegram.org/stickers#video-sticker-requirements for technical requirements
 * @property string       $sticker_type   __Required: Optional__. Type of stickers in the set, pass “regular” or “mask”. Custom emoji sticker sets can't be created via the Bot API at the moment. By default, a regular sticker set is created.
 * @property string       $emojis         __Required: Yes__. One or more emoji corresponding to the sticker
 * @property MaskPosition $mask_position  __Required: Optional__. A JSON-serialized object for position where the mask should be placed on faces
 */
class CreateNewStickerSetMethod extends TelegramMethod
{
    protected string $method = 'createNewStickerSet';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id'        => 'string',
        'name'           => 'string',
        'title'          => 'string',
        'png_sticker'    => 'InputFile',
        'tgs_sticker'    => 'InputFile',
        'webm_sticker'   => 'InputFile',
        'sticker_type'   => 'string',
        'emojis'         => 'string',
        'contains_masks' => 'boolean', // DEPRECATED
        'mask_position'  => 'MaskPosition',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
