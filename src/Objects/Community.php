<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a community (a group of chats).
 * @property-read int $id Unique identifier for this community. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read string $name Name of the community
 *
 * @see https://core.telegram.org/bots/api#community
 */
class Community extends TelegramObject
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
    ) {
    }
}
