<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a keyboard button to be used by a user of a Mini App.
 * @property-read string $id Unique identifier of the keyboard button
 *
 * @see https://core.telegram.org/bots/api#preparedkeyboardbutton
 */
class PreparedKeyboardButton extends TelegramObject
{
    public function __construct(
        public readonly string $id,
    ) {
    }
}
