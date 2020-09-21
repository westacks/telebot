<?php

namespace WeStacks\TeleBot\Objects\Passport;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * Contains information about Telegram Passport data shared with the bot by the user.
 *
 * @property Array<EncryptedPassportElement> $data        Array with information about documents and other Telegram Passport elements that was shared with the bot
 * @property EncryptedCredentials            $credentials Encrypted credentials required to decrypt the data
 */
class PassportData extends TelegramObject
{
    protected function relations()
    {
        return [
            'data' => [EncryptedPassportElement::class],
            'credentials' => EncryptedCredentials::class,
        ];
    }
}
