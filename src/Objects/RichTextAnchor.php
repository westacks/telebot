<?php

namespace WeStacks\TeleBot\Objects;

/**
 * An anchor.
 * @property-read string $type Type of the rich text, always “anchor”
 * @property-read string $name The name of the anchor
 *
 * @see https://core.telegram.org/bots/api#richtextanchor
 */
class RichTextAnchor extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly string $name,
    ) {
    }
}
