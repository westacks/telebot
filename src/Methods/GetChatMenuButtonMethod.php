<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
 *
 * @property-read ?int $chat_id Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
 *
 * @see https://core.telegram.org/bots/api#getchatmenubutton
 */
class GetChatMenuButtonMethod extends TelegramMethod
{
    protected string $method = 'getChatMenuButton';
    protected array $expect = ['MenuButton'];

    public function __construct(
        public readonly ?int $chat_id,
    ) {
    }
}
