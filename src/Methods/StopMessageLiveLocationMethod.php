<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;

/**
 * Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * @property string               $chat_id           __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int                  $message_id        __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message with live location to stop
 * @property string               $inline_message_id __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property InlineKeyboardMarkup $reply_markup      __Required: Optional__. A JSON-serialized object for a new inline keyboard.
 */
class StopMessageLiveLocationMethod extends TelegramMethod
{
    protected string $method = 'stopMessageLiveLocation';

    protected string $expect = 'Message|boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_id' => 'integer',
        'inline_message_id' => 'string',
        'reply_markup' => 'InlineKeyboardMarkup',
    ];
}
