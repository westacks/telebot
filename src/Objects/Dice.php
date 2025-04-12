<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an animated emoji that displays a random value.
 * @property-read string $emoji Emoji on which the dice throw animation is based
 * @property-read int $value Value of the dice, 1-6 for “”, “” and “” base emoji, 1-5 for “” and “” base emoji, 1-64 for “” base emoji
 *
 * @see https://core.telegram.org/bots/api#dice
 */
class Dice extends TelegramObject
{
    public function __construct(
        public readonly string $emoji,
        public readonly int $value,
    ) {
    }
}
