<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A cashtag.
 * @property-read string $type Type of the rich text, always “cashtag”
 * @property-read RichText $text The text
 * @property-read string $cashtag The cashtag
 *
 * @see https://core.telegram.org/bots/api#richtextcashtag
 */
class RichTextCashtag extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $cashtag,
    ) {
    }
}
