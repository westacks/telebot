<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match the format of the stickers in the set. Returns True on success.
 *
 * @property-read string $name Sticker set name
 * @property-read int $user_id User identifier of the sticker set owner
 * @property-read null|InputFile|string $thumbnail A .WEBP or .PNG image with the thumbnail, must be up to 128 kilobytes in size and have a width and height of exactly 100px, or a .TGS animation with a thumbnail up to 32 kilobytes in size (see https://core.telegram.org/stickers#animation-requirements for animated sticker technical requirements), or a .WEBM video with the thumbnail up to 32 kilobytes in size; see https://core.telegram.org/stickers#video-requirements for video sticker technical requirements. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files ». Animated and video sticker set thumbnails can't be uploaded via HTTP URL. If omitted, then the thumbnail is dropped and the first sticker is used as the thumbnail.
 * @property-read string $format Format of the thumbnail, must be one of “static” for a .WEBP or .PNG image, “animated” for a .TGS animation, or “video” for a .WEBM video
 *
 * @see https://core.telegram.org/bots/api#setstickersetthumbnail
 */
class SetStickerSetThumbnailMethod extends TelegramMethod
{
    protected string $method = 'setStickerSetThumbnail';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $name,
        public readonly int $user_id,
        public readonly null|InputFile|string $thumbnail,
        public readonly string $format,
    ) {
    }
}
