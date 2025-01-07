<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match the format of the stickers in the set. Returns True on success.
 *
 * @property string    $name      __Required: Yes__. Sticker set name
 * @property int       $user_id   __Required: Yes__. User identifier of the sticker set owner
 * @property InputFile $thumbnail __Required: Optional__. A __.WEBP__ or __.PNG__ image with the thumbnail, must be up to 128 kilobytes in size and have a width and height of exactly 100px, or a __.TGS__ animation with a thumbnail up to 32 kilobytes in size (see [Link](https://core.telegram.org/stickers#animation-requirements) for animated sticker technical requirements), or a __.WEBM__ video with the thumbnail up to 32 kilobytes in size; see [Link](https://core.telegram.org/stickers#video-requirements) for video sticker technical requirements. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files). Animated and video sticker set thumbnails can't be uploaded via HTTP URL. If omitted, then the thumbnail is dropped and the first sticker is used as the thumbnail.
 * @property string    $format    __Required: Yes__. Format of the thumbnail, must be one of “static” for a __.WEBP__ or __.PNG__ image, “animated” for a __.TGS__ animation, or “video” for a __.WEBM__ video
 */
class SetStickerSetThumbnailMethod extends TelegramMethod
{
    protected string $method = 'setStickerSetThumbnail';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'name' => 'string',
        'user_id' => 'integer',
        'thumbnail' => 'InputFile',
        'format' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
