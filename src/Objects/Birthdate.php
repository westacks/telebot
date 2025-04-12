<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the birthdate of a user.
 * @property-read int $day Day of the user's birth; 1-31
 * @property-read int $month Month of the user's birth; 1-12
 * @property-read ?int $year Optional. Year of the user's birth
 *
 * @see https://core.telegram.org/bots/api#birthdate
 */
class Birthdate extends TelegramObject
{
    public function __construct(
        public readonly int $day,
        public readonly int $month,
        public readonly ?int $year,
    ) {
    }
}
