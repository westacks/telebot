<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\MenuButton;

/**
 * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
 *
 * @property-read ?int $chat_id Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
 * @property-read ?MenuButton $menu_button A JSON-serialized object for the bot's new menu button. Defaults to MenuButtonDefault
 *
 * @see https://core.telegram.org/bots/api#setchatmenubutton
 */
class SetChatMenuButtonMethod extends TelegramMethod
{
    protected string $method = 'setChatMenuButton';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?int $chat_id,
        public readonly ?MenuButton $menu_button,
    ) {
    }
}
