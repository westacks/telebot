<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatAdministratorRights;

/**
 * Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
 *
 * @property bool $for_channels __Required: Optional__. Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
 */
class GetMyDefaultAdministratorRightsMethod extends TelegramMethod
{
    protected string $method = 'getMyDefaultAdministratorRights';

    protected string $expect = 'ChatAdministratorRights';

    protected array $parameters = [
        'for_channels' => 'boolean',
    ];
}
