<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\KeyboardButton;

/**
 * Stores a keyboard button that can be used by a user within a Mini App. Returns a PreparedKeyboardButton object.
 *
 * @property-read int $user_id Unique identifier of the target user that can use the button
 * @property-read KeyboardButton $button A JSON-serialized object describing the button to be saved. The button must be of the type request_users, request_chat, or request_managed_bot.
 *
 * @see https://core.telegram.org/bots/api#savepreparedkeyboardbutton
 */
class SavePreparedKeyboardButtonMethod extends TelegramMethod
{
    protected string $method = 'savePreparedKeyboardButton';
    protected array $expect = ['PreparedKeyboardButton'];

    public function __construct(
        public readonly int $user_id,
        public readonly KeyboardButton $button,
    ) {
    }
}
