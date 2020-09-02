<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link "_https://api.telegram.org/file/bot<token\>/\<file_path\>_". It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling `getFile`.
 * Maximum file size to download is 20 MB
 * 
 * @property String            $file_id              Identifier for this file, which can be used to download or reuse the file
 * @property String            $file_unique_id       Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property Integer           $file_size            _Optional_. File size, if known
 * @property String            $file_path            _Optional_. File path. Use "_https://api.telegram.org/file/bot<token\>/\<file_path\>_" to get the file.
 * 
 * @package WeStacks\TeleBot\Objects
 */

class File extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id'           => 'string',
            'file_unique_id'    => 'string',
            'file_size'         => 'integer',
            'file_path'         => 'string'
        ];
    }

    /**
     * Get the file URL to download file
     * 
     * @param string $token Telegram bot token
     * @return string 
     */
    public function url($token)
    {
        return "https://api.telegram.org/file/bot{$token}/{$this->file_path}";
    }
}