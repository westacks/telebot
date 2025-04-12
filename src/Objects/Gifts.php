<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represent a list of gifts.
 * @property-read Gift[] $gifts The list of gifts
 *
 * @see https://core.telegram.org/bots/api#gifts
 */
class Gifts extends TelegramObject
{
    public function __construct(
        public readonly array $gifts,
    ) {
    }
}
