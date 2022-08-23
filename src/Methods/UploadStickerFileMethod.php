<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\File;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and addStickerToSet methods (can be used multiple times). Returns the uploaded [File](https://core.telegram.org/bots/api#file) on success.
 *
 * @property int       $user_id     __Required: Yes__. User identifier of sticker file owner
 * @property InputFile $png_sticker __Required: Yes__. PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either width or height must be exactly 512px. More info on Sending Files »
 */
class UploadStickerFileMethod extends TelegramMethod
{
    protected string $method = 'uploadStickerFile';

    protected string $expect = 'File';

    protected array $parameters = [
        'user_id'     => 'string',
        'png_sticker' => 'InputFile',
    ];

    public function mock($arguments)
    {
        return new File([
            'file_id'        => 'file_id',
            'file_size'      => 123,
            'file_path'      => 'file_path',
            'file_unique_id' => 'file_unique_id',
        ]);
    }
}
