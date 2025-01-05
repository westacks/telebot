<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Represents a [result](https://core.telegram.org/bots/api#inlinequeryresult) of an inline query that was chosen by the user and sent to their chat partner. __Note:__ It is necessary to enable [inline feedback](https://core.telegram.org/bots/inline#collecting-feedback) via [@BotFather](https://t.me/botfather) in order to receive these objects in updates.
 *
 * @property string   $result_id         The unique identifier for the result that was chosen
 * @property User     $from              The user that chose the result
 * @property Location $location          Optional. Sender location, only for bots that require user location
 * @property string   $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an [inline keyboard](https://core.telegram.org/bots/api#inlinekeyboardmarkup) attached to the message. Will be also received in [callback queries](https://core.telegram.org/bots/api#callbackquery) and can be used to [edit](https://core.telegram.org/bots/api#updating-messages) the message.
 * @property string   $query             The query that was used to obtain the result
 */
class ChosenInlineResult extends TelegramObject
{
    protected $attributes = [
        'result_id' => 'string',
        'from' => 'User',
        'location' => 'Location',
        'inline_message_id' => 'string',
        'query' => 'string',
    ];
}
