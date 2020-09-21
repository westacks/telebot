<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * Contains information about why a request was unsuccessful.
 *
 * @property int $migrate_to_chat_id _Optional_. The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @property int $retry_after        _Optional_. In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
 */
class ResponseParameters extends TelegramObject
{
    protected function relations()
    {
        return [
            'migrate_to_chat_id' => 'integer',
            'retry_after' => 'integer',
        ];
    }
}
