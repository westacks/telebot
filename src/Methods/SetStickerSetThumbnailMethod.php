<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to set the thumbnail of a sticker set. Animated thumbnails can be set for animated sticker sets only. Returns True on success.
 *
 * @property string    $name      __Required: Yes__. Sticker set name
 * @property int       $user_id   __Required: Yes__. User identifier of the sticker set owner
 * @property InputFile $thumbnail __Required: Optional__. A PNG image with the thumbnail, must be up to 128 kilobytes in size and have width and height exactly 100px, or a TGS animation with the thumbnail up to 32 kilobytes in size; see https://core.telegram.org/animated_stickers#technical-requirements for animated sticker technical requirements. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files ». Animated sticker set thumbnail can't be uploaded via HTTP URL.
 */
class SetStickerSetThumbnailMethod extends TelegramMethod
{
    protected string $method = 'setStickerSetThumbnail';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'name' => 'string',
        'user_id' => 'string',
        'thumbnail' => 'InputFile',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
