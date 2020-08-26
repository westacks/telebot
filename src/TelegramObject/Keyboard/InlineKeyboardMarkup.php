<?php

namespace WeStacks\TeleBot\TelegramObject\Keyboard;

use WeStacks\TeleBot\TelegramObject\InlineKeyboardButton;
use WeStacks\TeleBot\TelegramObject\Keyboard;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 * 
 * @property Array<Array<InlineKeyboardButton>> $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 * 
 * @package WeStacks\TeleBot\TelegramObject\Keyboard
 */

class InlineKeyboardMarkup extends Keyboard
{
    protected function relations()
    {
        return [
            'inline_keyboard' => array(array(InlineKeyboardButton::class))
        ];
    }
}