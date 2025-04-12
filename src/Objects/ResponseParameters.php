<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes why a request was unsuccessful.
 * @property-read ?int $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read ?int $retry_after Optional. In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
 *
 * @see https://core.telegram.org/bots/api#responseparameters
 */
class ResponseParameters extends TelegramObject
{
    public function __construct(
        public readonly ?int $migrate_to_chat_id,
        public readonly ?int $retry_after,
    ) {
    }
}
