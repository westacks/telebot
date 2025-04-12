<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
 *
 * @property-read ?bool $for_channels Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
 *
 * @see https://core.telegram.org/bots/api#getmydefaultadministratorrights
 */
class GetMyDefaultAdministratorRightsMethod extends TelegramMethod
{
    protected string $method = 'getMyDefaultAdministratorRights';
    protected array $expect = ['ChatAdministratorRights'];

    public function __construct(
        public readonly ?bool $for_channels,
    ) {
    }
}
