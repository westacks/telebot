<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A monowidth text.
 * @property-read string $type Type of the rich text, always “code”
 * @property-read RichText $text The text
 *
 * @see https://core.telegram.org/bots/api#richtextcode
 */
class RichTextCode extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
