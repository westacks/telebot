<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) that appears right next to the message it belongs to.
 *
 * @property InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of [InlineKeyboardButton](https://core.telegram.org/bots/api#inlinekeyboardbutton) objects
 */
class InlineKeyboardMarkup extends Keyboard
{
    protected $attributes = [
        'inline_keyboard' => 'InlineKeyboardButton[][]',
    ];
}
