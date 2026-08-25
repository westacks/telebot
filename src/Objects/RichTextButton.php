<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A button.
 * @property-read string $type Type of the rich text, always “button”
 * @property-read RichMessageButton $button The button
 *
 * @see https://core.telegram.org/bots/api#richtextbutton
 */
class RichTextButton extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichMessageButton $button,
    ) {
    }
}
