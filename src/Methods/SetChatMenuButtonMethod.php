<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MenuButton;

/**
 * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property string     $chat_id     __Required: Optional__. Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
 * @property MenuButton $menu_button __Required: Optional__. A JSON-serialized object for the new bot's menu button. Defaults to MenuButtonDefault
 */
class SetChatMenuButtonMethod extends TelegramMethod
{
    protected string $method = 'setChatMenuButton';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'menu_button' => 'MenuButton',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
