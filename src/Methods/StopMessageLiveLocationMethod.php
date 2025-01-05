<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Message;

/**
 * Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * @property string               $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property string               $chat_id                __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int                  $message_id             __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message with live location to stop
 * @property string               $inline_message_id      __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property InlineKeyboardMarkup $reply_markup           __Required: Optional__. A JSON-serialized object for a new [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards).
 */
class StopMessageLiveLocationMethod extends TelegramMethod
{
    protected string $method = 'stopMessageLiveLocation';

    protected string $expect = 'Message|boolean';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_id' => 'integer',
        'inline_message_id' => 'string',
        'reply_markup' => 'InlineKeyboardMarkup',
    ];

    public function mock($arguments)
    {
        if (isset($arguments['inline_message_id'])) {
            return true;
        }

        return new Message([
            'message_id' => rand(1, 100),
            'chat' => [
                'id' => rand(1, 100),
                'type' => 'private',
            ],
        ]);
    }
}
