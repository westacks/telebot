<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 * @property-read EncryptedPassportElement[] $data Array with information about documents and other Telegram Passport elements that was shared with the bot
 * @property-read EncryptedCredentials $credentials Encrypted credentials required to decrypt the data
 *
 * @see https://core.telegram.org/bots/api#passportdata
 */
class PassportData extends TelegramObject
{
    public function __construct(
        public readonly array $data,
        public readonly EncryptedCredentials $credentials,
    ) {
    }
}
