<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents an animated emoji that displays a random value.
 *
 * @property string $emoji Emoji on which the dice throw animation is based
 * @property int    $value Value of the dice, 1-6 for “![🎲](https://telegram.org/img/emoji/40/F09F8EB2.png)”, “![🎯](https://telegram.org/img/emoji/40/F09F8EAF.png)” and “![🎳](https://telegram.org/img/emoji/40/F09F8EB3.png)” base emoji, 1-5 for “![🏀](https://telegram.org/img/emoji/40/F09F8F80.png)” and “![⚽](https://telegram.org/img/emoji/40/E29ABD.png)” base emoji, 1-64 for “![🎰](https://telegram.org/img/emoji/40/F09F8EB0.png)” base emoji
 */
class Dice extends TelegramObject
{
    protected $attributes = [
        'emoji' => 'string',
        'value' => 'integer',
    ];
}
