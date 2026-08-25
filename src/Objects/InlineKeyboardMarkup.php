<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 * @property-read InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 * @property-read ?bool $force_reply Optional. Pass True if the reply interface must be shown to the user, as if they had manually selected the bot's message and tapped 'Reply'. The value of the field can't be changed when the inline keyboard is edited.
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends TelegramObject
{
    public function __construct(
        public readonly array $inline_keyboard,
        public readonly ?bool $force_reply,
    ) {
    }
}
