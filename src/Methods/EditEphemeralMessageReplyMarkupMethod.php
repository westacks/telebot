<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;

/**
 * Use this method to edit only the reply markup of an ephemeral message. Note that it is not guaranteed that the user will receive the message edit event, especially if they are offline. On success, True is returned.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username
 * @property-read int $receiver_user_id Identifier of the user who received the message
 * @property-read int $ephemeral_message_id Identifier of the ephemeral message to edit
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard
 *
 * @see https://core.telegram.org/bots/api#editephemeralmessagereplymarkup
 */
class EditEphemeralMessageReplyMarkupMethod extends TelegramMethod
{
    protected string $method = 'editEphemeralMessageReplyMarkup';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $receiver_user_id,
        public readonly int $ephemeral_message_id,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
