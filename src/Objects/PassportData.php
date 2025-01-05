<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 *
 * @property EncryptedPassportElement[] $data        Array with information about documents and other Telegram Passport elements that was shared with the bot
 * @property EncryptedCredentials       $credentials Encrypted credentials required to decrypt the data
 */
class PassportData extends TelegramObject
{
    protected $attributes = [
        'data' => 'EncryptedPassportElement[]',
        'credentials' => 'EncryptedCredentials',
    ];
}
