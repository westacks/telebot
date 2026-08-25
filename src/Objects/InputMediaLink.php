<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents an HTTP link to be sent.
 * @property-read string $type Type of the media, must be link
 * @property-read string $url HTTP URL of the link
 *
 * @see https://core.telegram.org/bots/api#inputmedialink
 */
class InputMediaLink extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly string $url,
    ) {
    }
}
