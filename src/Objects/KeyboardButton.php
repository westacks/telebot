<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents one button of the reply keyboard. For simple text buttons String can be used instead of this object to specify text of the button. Optional fields request_contact, request_location, and request_poll are mutually exclusive.
 * 
 * @property String                          $text                    Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
 * @property Boolean                         $request_contact         _Optional_. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
 * @property Boolean                         $request_location        _Optional_. If True, the user's current location will be sent when the button is pressed. Available in private chats only
 * @property KeyboardButtonPollType          $request_poll            _Optional_. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only
 * 
 * @package WeStacks\TeleBot\Objects
 */
class KeyboardButton extends TelegramObject
{
    protected function relations()
    {
        return [
            'text'              => 'string',
            'request_contact'   => 'boolean',
            'request_location'  => 'boolean',
            'request_poll'      => KeyboardButtonPollType::class
        ];
    }
}