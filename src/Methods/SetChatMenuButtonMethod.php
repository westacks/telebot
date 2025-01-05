<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MenuButton;

/**
 * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
 *
 * @property int        $chat_id     __Required: Optional__. Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
 * @property MenuButton $menu_button __Required: Optional__. A JSON-serialized object for the bot's new menu button. Defaults to [MenuButtonDefault](https://core.telegram.org/bots/api#menubuttondefault)
 */
class SetChatMenuButtonMethod extends TelegramMethod
{
    protected string $method = 'setChatMenuButton';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'integer',
        'menu_button' => 'MenuButton',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
