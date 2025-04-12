<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to upload a file with a sticker for later use in the createNewStickerSet, addStickerToSet, or replaceStickerInSet methods (the file can be used multiple times). Returns the uploaded File on success.
 *
 * @property-read int $user_id User identifier of sticker file owner
 * @property-read InputFile $sticker A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See https://core.telegram.org/stickers for technical requirements. More information on Sending Files »
 * @property-read string $sticker_format Format of the sticker, must be one of “static”, “animated”, “video”
 *
 * @see https://core.telegram.org/bots/api#uploadstickerfile
 */
class UploadStickerFileMethod extends TelegramMethod
{
    protected string $method = 'uploadStickerFile';
    protected array $expect = ['File'];

    public function __construct(
        public readonly int $user_id,
        public readonly InputFile $sticker,
        public readonly string $sticker_format,
    ) {
    }
}
