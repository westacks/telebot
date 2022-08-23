<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatPermissions;

/**
 * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
 *
 * @property string          $chat_id     __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property ChatPermissions $permissions __Required: Yes__. A JSON-serialized object for new default chat permissions
 */
class SetChatPermissionsMethod extends TelegramMethod
{
    protected string $method = 'setChatPermissions';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id'     => 'string',
        'permissions' => 'ChatPermissions',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
