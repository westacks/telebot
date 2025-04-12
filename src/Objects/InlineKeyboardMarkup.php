<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 * @property-read InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends TelegramObject
{
    public function __construct(
        public readonly array $inline_keyboard,
    ) {
    }
}
