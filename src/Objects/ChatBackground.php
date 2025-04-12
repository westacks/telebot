<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a chat background.
 * @property-read BackgroundType $type Type of the background
 *
 * @see https://core.telegram.org/bots/api#chatbackground
 */
class ChatBackground extends TelegramObject
{
    public function __construct(
        public readonly BackgroundType $type,
    ) {
    }
}
