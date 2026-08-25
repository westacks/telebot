<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * An anchor.
 * @property-read string $type Type of the rich text, always “anchor”
 * @property-read string $name The name of the anchor
 *
 * @see https://core.telegram.org/bots/api#richtextanchor
 */
class RichTextAnchor extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly string $name,
    ) {
    }
}
