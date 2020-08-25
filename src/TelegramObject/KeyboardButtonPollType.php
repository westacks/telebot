<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 * 
 * @property String $type _Optional_. If quiz is passed, the user will be allowed to create only polls in the quiz mode. If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
 * 
 * @package WeStacks\TeleBot\TelegramObject
 */

class KeyboardButtonPollType extends TelegramObject
{
    protected function relations()
    {
        return [
            'type' => 'string'
        ];
    }
}