<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\File;

/**
 * Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a [File](https://core.telegram.org/bots/api#file) object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling [getFile](https://core.telegram.org/bots/api#getfile) again. __Note:__ This function may not preserve the original file name and MIME type. You should save the file's MIME type and name (if available) when the File object is received.
 *
 * @property string $file_id __Required: Yes__. File identifier to get information about
 */
class GetFileMethod extends TelegramMethod
{
    protected string $method = 'getFile';

    protected string $expect = 'File';

    protected array $parameters = [
        'file_id' => 'string',
    ];

    public function mock($arguments)
    {
        return new File([
            'file_id' => $arguments['file_id'],
            'file_unique_id' => 'mock-file-unique-id',
            'file_size' => 12345,
            'file_path' => 'mock-file-path',
        ]);
    }
}
