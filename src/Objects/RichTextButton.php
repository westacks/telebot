<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A button.
 * @property-read string $type Type of the rich text, always “button”
 * @property-read RichMessageButton $button The button
 *
 * @see https://core.telegram.org/bots/api#richtextbutton
 */
class RichTextButton extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichMessageButton $button,
    ) {
    }
}
