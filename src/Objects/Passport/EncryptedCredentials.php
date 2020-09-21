<?php

namespace WeStacks\TeleBot\Objects\Passport;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * Contains data required for decrypting and authenticating EncryptedPassportElement. See the Telegram Passport Documentation for a complete description of the data decryption and authentication processes.
 *
 * @property string $data   Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required for EncryptedPassportElement decryption and authentication
 * @property string $hash   Base64-encoded data hash for data authentication
 * @property string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
 */
class EncryptedCredentials extends TelegramObject
{
    protected function relations()
    {
        return [
            'data' => 'string',
            'hash' => 'string',
            'secret' => 'string',
        ];
    }
}
