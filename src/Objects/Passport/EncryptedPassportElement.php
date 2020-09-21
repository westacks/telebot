<?php

namespace WeStacks\TeleBot\Objects\Passport;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * Contains information about documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @property string              $type         Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”.
 * @property string              $data         _Optional_. Base64-encoded encrypted Telegram Passport element data provided by the user, available for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” types. Can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property string              $phone_number _Optional_. User's verified phone number, available only for “phone_number” type
 * @property string              $email        _Optional_. User's verified email address, available only for “email” type
 * @property Array<PassportFile> $files        _Optional_. Array of encrypted files with documents provided by the user, available for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property PassportFile        $front_side   _Optional_. Encrypted file with the front side of the document, provided by the user. Available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property PassportFile        $reverse_side _Optional_. Encrypted file with the reverse side of the document, provided by the user. Available for “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property PassportFile        $selfie       _Optional_. Encrypted file with the selfie of the user holding a document, provided by the user; available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property Array<PassportFile> $translation  _Optional_. Array of encrypted files with translated versions of documents provided by the user. Available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property string              $hash         Base64-encoded element hash for using in PassportElementErrorUnspecified
 */
class EncryptedPassportElement extends TelegramObject
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'data' => 'string',
            'phone_number' => 'string',
            'email' => 'string',
            'files' => [PassportFile::class],
            'front_side' => PassportFile::class,
            'reverse_side' => PassportFile::class,
            'translation' => [PassportFile::class],
            'hash' => 'string',
        ];
    }
}
