<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to get basic info about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a [File](https://core.telegram.org/bots/api#file) object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling [getFile](https://core.telegram.org/bots/api#getfile) again.
 *
 * @property string $file_id __Required: Yes__. File identifier to get info about
 */
class GetFileMethod extends TelegramMethod
{
    protected string $method = 'getFile';

    protected string $expect = 'File';

    protected array $parameters = [
        'file_id' => 'string',
    ];
}
