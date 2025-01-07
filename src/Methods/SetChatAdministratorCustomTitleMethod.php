<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
 *
 * @property string $chat_id      __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property int    $user_id      __Required: Yes__. Unique identifier of the target user
 * @property string $custom_title __Required: Yes__. New custom title for the administrator; 0-16 characters, emoji are not allowed
 */
class SetChatAdministratorCustomTitleMethod extends TelegramMethod
{
    protected string $method = 'setChatAdministratorCustomTitle';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'user_id' => 'integer',
        'custom_title' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
