<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document translation change.
 * @property-read string $source Error source, must be translation_files
 * @property-read string $type Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property-read string[] $file_hashes List of base64-encoded file hashes
 * @property-read string $message Error message
 *
 * @see https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 */
class PassportElementErrorTranslationFiles extends PassportElementError
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly array $file_hashes,
        public readonly string $message,
    ) {
    }
}
