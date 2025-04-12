<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue with one of the files that constitute the translation of a document. The error is considered resolved when the file changes.
 * @property-read string $source Error source, must be translation_file
 * @property-read string $type Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property-read string $file_hash Base64-encoded file hash
 * @property-read string $message Error message
 *
 * @see https://core.telegram.org/bots/api#passportelementerrortranslationfile
 */
class PassportElementErrorTranslationFile extends PassportElementError
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $file_hash,
        public readonly string $message,
    ) {
    }
}
