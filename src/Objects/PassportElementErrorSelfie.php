<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie changes.
 * @property-read string $source Error source, must be selfie
 * @property-read string $type The section of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”
 * @property-read string $file_hash Base64-encoded hash of the file with the selfie
 * @property-read string $message Error message
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorselfie
 */
class PassportElementErrorSelfie extends PassportElementError
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $file_hash,
        public readonly string $message,
    ) {
    }
}
