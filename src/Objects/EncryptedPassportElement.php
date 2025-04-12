<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 * @property-read string $type Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”.
 * @property-read ?string $data Optional. Base64-encoded encrypted Telegram Passport element data provided by the user; available only for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” types. Can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property-read ?string $phone_number Optional. User's verified phone number; available only for “phone_number” type
 * @property-read ?string $email Optional. User's verified email address; available only for “email” type
 * @property-read ?PassportFile[] $files Optional. Array of encrypted files with documents provided by the user; available only for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property-read ?PassportFile $front_side Optional. Encrypted file with the front side of the document, provided by the user; available only for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property-read ?PassportFile $reverse_side Optional. Encrypted file with the reverse side of the document, provided by the user; available only for “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property-read ?PassportFile $selfie Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available if requested for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property-read ?PassportFile[] $translation Optional. Array of encrypted files with translated versions of documents provided by the user; available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property-read string $hash Base64-encoded element hash for using in PassportElementErrorUnspecified
 *
 * @see https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly ?string $data,
        public readonly ?string $phone_number,
        public readonly ?string $email,
        public readonly ?array $files,
        public readonly ?PassportFile $front_side,
        public readonly ?PassportFile $reverse_side,
        public readonly ?PassportFile $selfie,
        public readonly ?array $translation,
        public readonly string $hash,
    ) {
    }
}
