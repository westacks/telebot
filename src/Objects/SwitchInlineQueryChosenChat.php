<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 * @property-read ?string $query Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted
 * @property-read ?bool $allow_user_chats Optional. True, if private chats with users can be chosen
 * @property-read ?bool $allow_bot_chats Optional. True, if private chats with bots can be chosen
 * @property-read ?bool $allow_group_chats Optional. True, if group and supergroup chats can be chosen
 * @property-read ?bool $allow_channel_chats Optional. True, if channel chats can be chosen
 *
 * @see https://core.telegram.org/bots/api#switchinlinequerychosenchat
 */
class SwitchInlineQueryChosenChat extends TelegramObject
{
    public function __construct(
        public readonly ?string $query,
        public readonly ?bool $allow_user_chats,
        public readonly ?bool $allow_bot_chats,
        public readonly ?bool $allow_group_chats,
        public readonly ?bool $allow_channel_chats,
    ) {
    }
}
