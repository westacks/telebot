<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling [getFile](https://core.telegram.org/bots/api#getfile).  The maximum file size to download is 20 MB
 *
 * @property string $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int    $file_size      Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 * @property string $file_path      Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
 */
class File extends TelegramObject
{
    protected $attributes = [
        'file_id' => 'string',
        'file_unique_id' => 'string',
        'file_size' => 'integer',
        'file_path' => 'string',
    ];

    /**
     * Get the file URL to download file.
     *
     * @param  string $token Telegram bot token
     * @return string
     */
    public function url(string $token, string $api = 'https://api.telegram.org')
    {
        return "{$api}/file/bot{$token}/{$this->file_path}";
    }
}
