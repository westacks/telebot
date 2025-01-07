<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes the birthdate of a user.
 *
 * @property int $day   Day of the user's birth; 1-31
 * @property int $month Month of the user's birth; 1-12
 * @property int $year  Optional. Year of the user's birth
 */
class Birthdate extends TelegramObject
{
    protected $attributes = [
        'day' => 'integer',
        'month' => 'integer',
        'year' => 'integer',
    ];
}
