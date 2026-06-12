<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents an HTTP link.
 * @property-read string $url URL of the link
 *
 * @see https://core.telegram.org/bots/api#link
 */
class Link extends TelegramObject
{
    public function __construct(
        public readonly string $url,
    ) {
    }
}
