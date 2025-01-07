<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MenuButtonDefault;

/**
 * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns [MenuButton](https://core.telegram.org/bots/api#menubutton) on success.
 *
 * @property int $chat_id __Required: Optional__. Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
 */
class GetChatMenuButtonMethod extends TelegramMethod
{
    protected string $method = 'getChatMenuButton';

    protected string $expect = 'MenuButton';

    protected array $parameters = [
        'chat_id' => 'integer',
    ];

    public function mock($arguments)
    {
        return new MenuButtonDefault([
            'type' => 'default',
        ]);
    }
}
