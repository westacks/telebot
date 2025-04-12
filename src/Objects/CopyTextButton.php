<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an inline keyboard button that copies specified text to the clipboard.
 * @property-read string $text The text to be copied to the clipboard; 1-256 characters
 *
 * @see https://core.telegram.org/bots/api#copytextbutton
 */
class CopyTextButton extends TelegramObject
{
    public function __construct(
        public readonly string $text,
    ) {
    }
}
