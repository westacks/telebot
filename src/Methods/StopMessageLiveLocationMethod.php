<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;

/**
 * Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property-read null|int|string $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_id Required if inline_message_id is not specified. Identifier of the message with live location to stop
 * @property-read ?string $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for a new inline keyboard.
 *
 * @see https://core.telegram.org/bots/api#stopmessagelivelocation
 */
class StopMessageLiveLocationMethod extends TelegramMethod
{
    protected string $method = 'stopMessageLiveLocation';
    protected array $expect = ['Message', 'true'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly null|int|string $chat_id,
        public readonly ?int $message_id,
        public readonly ?string $inline_message_id,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
