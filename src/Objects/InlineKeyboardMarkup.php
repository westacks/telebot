<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents an [inline keyboard](https://core.telegram.org/bots#inline-keyboards-and-on-the-fly-updating) that appears right next to the message it belongs to.
 *
 * @property InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 */
class InlineKeyboardMarkup extends Keyboard
{
    protected $attributes = [
        'inline_keyboard' => 'InlineKeyboardButton[][]',
    ];
}
