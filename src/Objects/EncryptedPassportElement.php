<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @property string         $type         Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”.
 * @property string         $data         Optional. Base64-encoded encrypted Telegram Passport element data provided by the user; available only for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” types. Can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property string         $phone_number Optional. User's verified phone number; available only for “phone_number” type
 * @property string         $email        Optional. User's verified email address; available only for “email” type
 * @property PassportFile[] $files        Optional. Array of encrypted files with documents provided by the user; available only for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property PassportFile   $front_side   Optional. Encrypted file with the front side of the document, provided by the user; available only for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property PassportFile   $reverse_side Optional. Encrypted file with the reverse side of the document, provided by the user; available only for “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property PassportFile   $selfie       Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available if requested for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property PassportFile[] $translation  Optional. Array of encrypted files with translated versions of documents provided by the user; available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property string         $hash         Base64-encoded element hash for using in [PassportElementErrorUnspecified](https://core.telegram.org/bots/api#passportelementerrorunspecified)
 */
class EncryptedPassportElement extends TelegramObject
{
    protected $attributes = [
        'type' => 'string',
        'data' => 'string',
        'phone_number' => 'string',
        'email' => 'string',
        'files' => 'PassportFile[]',
        'front_side' => 'PassportFile',
        'reverse_side' => 'PassportFile',
        'selfie' => 'PassportFile',
        'translation' => 'PassportFile[]',
        'hash' => 'string',
    ];
}
