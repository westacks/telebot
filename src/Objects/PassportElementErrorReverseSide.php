<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse side of the document changes.
 * @property-read string $source Error source, must be reverse_side
 * @property-read string $type The section of the user's Telegram Passport which has the issue, one of “driver_license”, “identity_card”
 * @property-read string $file_hash Base64-encoded hash of the file with the reverse side of the document
 * @property-read string $message Error message
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorreverseside
 */
class PassportElementErrorReverseSide extends PassportElementError
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $file_hash,
        public readonly string $message,
    ) {
    }
}
