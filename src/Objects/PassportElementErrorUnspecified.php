<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 * @property-read string $source Error source, must be unspecified
 * @property-read string $type Type of element of the user's Telegram Passport which has the issue
 * @property-read string $element_hash Base64-encoded element hash
 * @property-read string $message Error message
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorunspecified
 */
class PassportElementErrorUnspecified extends PassportElementError
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $element_hash,
        public readonly string $message,
    ) {
    }
}
