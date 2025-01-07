<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represent a list of gifts.
 *
 * @property Gift[] $gifts The list of gifts
 */
class Gifts extends TelegramObject
{
    protected $attributes = [
        'gifts' => 'Gift[]',
    ];
}
