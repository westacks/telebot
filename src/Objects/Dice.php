<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents an animated emoji that displays a random value.
 *
 * @property string $emoji Emoji on which the dice throw animation is based
 * @property int    $value Value of the dice, 1-6 for “🎲” and “🎯” base emoji, 1-5 for “🏀” base emoji
 */
class Dice extends TelegramObject
{
    protected function relations()
    {
        return [
            'emoji' => 'string',
            'value' => 'integer',
        ];
    }
}
