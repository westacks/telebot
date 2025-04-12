<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans changes.
 * @property-read string $source Error source, must be files
 * @property-read string $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
 * @property-read string[] $file_hashes List of base64-encoded file hashes
 * @property-read string $message Error message
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfiles
 */
class PassportElementErrorFiles extends PassportElementError
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly array $file_hashes,
        public readonly string $message,
    ) {
    }
}
