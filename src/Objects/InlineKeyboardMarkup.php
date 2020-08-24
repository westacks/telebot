<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 * 
 * @property Array<Array<InlineKeyboardButton>> $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 * 
 * @package WeStacks\TeleBot\Objects
 */
class InlineKeyboardMarkup extends TelegramObject
{
    protected function relations()
    {
        return [
            'inline_keyboard' => array(array(InlineKeyboardButton::class))
        ];
    }
}