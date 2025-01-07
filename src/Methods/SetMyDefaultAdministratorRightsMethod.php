<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatAdministratorRights;

/**
 * Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are free to modify the list before adding the bot. Returns True on success.
 *
 * @property ChatAdministratorRights $rights       __Required: Optional__. A JSON-serialized object describing new default administrator rights. If not specified, the default administrator rights will be cleared.
 * @property bool                    $for_channels __Required: Optional__. Pass True to change the default administrator rights of the bot in channels. Otherwise, the default administrator rights of the bot for groups and supergroups will be changed.
 */
class SetMyDefaultAdministratorRightsMethod extends TelegramMethod
{
    protected string $method = 'setMyDefaultAdministratorRights';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'rights' => 'ChatAdministratorRights',
        'for_channels' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
