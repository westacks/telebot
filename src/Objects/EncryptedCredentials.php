<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes data required for decrypting and authenticating EncryptedPassportElement. See the Telegram Passport Documentation for a complete description of the data decryption and authentication processes.
 * @property-read string $data Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required for EncryptedPassportElement decryption and authentication
 * @property-read string $hash Base64-encoded data hash for data authentication
 * @property-read string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
 *
 * @see https://core.telegram.org/bots/api#encryptedcredentials
 */
class EncryptedCredentials extends TelegramObject
{
    public function __construct(
        public readonly string $data,
        public readonly string $hash,
        public readonly string $secret,
    ) {
    }
}
