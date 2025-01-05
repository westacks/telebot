<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Poll;

/**
 * Use this method to stop a poll which was sent by the bot. On success, the stopped [Poll](https://core.telegram.org/bots/api#poll) is returned.
 *
 * @property string               $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property string               $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int                  $message_id             __Required: Yes__. Identifier of the original message with the poll
 * @property InlineKeyboardMarkup $reply_markup           __Required: Optional__. A JSON-serialized object for a new message [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards).
 */
class StopPollMethod extends TelegramMethod
{
    protected string $method = 'stopPoll';

    protected string $expect = 'Poll';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_id' => 'integer',
        'reply_markup' => 'InlineKeyboardMarkup',
    ];

    public function mock($arguments)
    {
        return new Poll([
            'id' => rand(1, 100),
            'question' => 'Question',
            'options' => [
                [
                    'text' => 'Option 1',
                    'voter_count' => rand(1, 100),
                ],
                [
                    'text' => 'Option 2',
                    'voter_count' => rand(1, 100),
                ],
            ],
        ]);
    }
}
