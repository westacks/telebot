<?php

namespace WeStacks\TeleBot\Objects\Keyboard;

use WeStacks\TeleBot\Objects\InlineKeyboardButton;
use WeStacks\TeleBot\Objects\Keyboard;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 *
 * @property Array<Array<InlineKeyboardButton>> $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 */
class InlineKeyboardMarkup extends Keyboard
{
    protected function relations()
    {
        return [
            'inline_keyboard' => [[InlineKeyboardButton::class]],
        ];
    }
}
