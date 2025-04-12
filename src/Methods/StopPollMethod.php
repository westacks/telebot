<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;

/**
 * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read int $message_id Identifier of the original message with the poll
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for a new message inline keyboard.
 *
 * @see https://core.telegram.org/bots/api#stoppoll
 */
class StopPollMethod extends TelegramMethod
{
    protected string $method = 'stopPoll';
    protected array $expect = ['Poll'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly int $message_id,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
