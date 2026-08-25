<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes that no specific value for the menu button was set.
 * @property-read string $type Type of the button, must be default
 *
 * @see https://core.telegram.org/bots/api#menubuttondefault
 */
class MenuButtonDefault extends TelegramObject
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
