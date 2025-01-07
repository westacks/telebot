<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\File;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to upload a file with a sticker for later use in the [createNewStickerSet](https://core.telegram.org/bots/api#createnewstickerset), [addStickerToSet](https://core.telegram.org/bots/api#addstickertoset), or [replaceStickerInSet](https://core.telegram.org/bots/api#replacestickerinset) methods (the file can be used multiple times). Returns the uploaded [File](https://core.telegram.org/bots/api#file) on success.
 *
 * @property int       $user_id        __Required: Yes__. User identifier of sticker file owner
 * @property InputFile $sticker        __Required: Yes__. A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See [Link](https://core.telegram.org/stickers) for technical requirements. [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
 * @property string    $sticker_format __Required: Yes__. Format of the sticker, must be one of “static”, “animated”, “video”
 */
class UploadStickerFileMethod extends TelegramMethod
{
    protected string $method = 'uploadStickerFile';

    protected string $expect = 'File';

    protected array $parameters = [
        'user_id' => 'integer',
        'sticker' => 'InputFile',
        'sticker_format' => 'string',
    ];

    public function mock($arguments)
    {
        return new File([
            'file_id' => 'file_id',
            'file_size' => 123,
            'file_path' => 'file_path',
            'file_unique_id' => 'file_unique_id',
        ]);
    }
}
