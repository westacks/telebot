<?php

namespace WeStacks\TeleBot\Objects\Passport;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 *
 * @property String                    $file_id                      Identifier for this file, which can be used to download or reuse the file
 * @property String                    $file_unique_id               Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property Integer                   $file_size                    File size
 * @property Integer                   $file_date                    Unix time when the file was uploaded
 *
 * @package WeStacks\TeleBot\Objects\Passport
 */
class PassportFile extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id'           => 'string',
            'file_unique_id'    => 'string',
            'file_size'         => 'integer',
            'file_date'         => 'integer',
        ];
    }
}
