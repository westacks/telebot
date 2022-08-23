<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MenuButton;

/**
 * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
 *
 * @property string $chat_id __Required: Optional__. Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
 */
class GetChatMenuButtonMethod extends TelegramMethod
{
    protected string $method = 'getChatMenuButton';

    protected string $expect = 'MenuButton';

    protected array $parameters = [
        'chat_id' => 'string',
    ];

    public function mock($arguments)
    {
        return new MenuButton([
            'type' => 'default',
        ]);
    }
}
