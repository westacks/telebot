<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a location to which a chat is connected.
 * @property-read Location $location The location to which the supergroup is connected. Can't be a live location.
 * @property-read string $address Location address; 1-64 characters, as defined by the chat owner
 *
 * @see https://core.telegram.org/bots/api#chatlocation
 */
class ChatLocation extends TelegramObject
{
    public function __construct(
        public readonly Location $location,
        public readonly string $address,
    ) {
    }
}
