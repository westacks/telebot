<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatAdministratorRights;

/**
 * Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are free to modify the list before adding the bot. Returns True on success.
 *
 * @property-read ?ChatAdministratorRights $rights A JSON-serialized object describing new default administrator rights. If not specified, the default administrator rights will be cleared.
 * @property-read ?bool $for_channels Pass True to change the default administrator rights of the bot in channels. Otherwise, the default administrator rights of the bot for groups and supergroups will be changed.
 *
 * @see https://core.telegram.org/bots/api#setmydefaultadministratorrights
 */
class SetMyDefaultAdministratorRightsMethod extends TelegramMethod
{
    protected string $method = 'setMyDefaultAdministratorRights';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?ChatAdministratorRights $rights,
        public readonly ?bool $for_channels,
    ) {
    }
}
