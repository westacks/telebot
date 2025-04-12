<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 * @property-read string $source Error source, must be file
 * @property-read string $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property-read string $file_hash Base64-encoded file hash
 * @property-read string $message Error message
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfile
 */
class PassportElementErrorFile extends PassportElementError
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $file_hash,
        public readonly string $message,
    ) {
    }
}
