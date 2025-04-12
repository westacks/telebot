<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 * @property-read ?string $type Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode. If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonpolltype
 */
class KeyboardButtonPollType extends TelegramObject
{
    public function __construct(
        public readonly ?string $type,
    ) {
    }
}
