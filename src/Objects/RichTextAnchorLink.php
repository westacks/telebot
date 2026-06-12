<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A link to an anchor.
 * @property-read string $type Type of the rich text, always “anchor_link”
 * @property-read string|RichText[]|RichText $text The link text
 * @property-read string $anchor_name The name of the anchor. If the name is empty, then the link brings back to the top of the message.
 *
 * @see https://core.telegram.org/bots/api#richtextanchorlink
 */
class RichTextAnchorLink extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
        public readonly string $anchor_name,
    ) {
    }
}
