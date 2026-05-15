<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the access settings of a managed bot. Returns a BotAccessSettings object on success.
 *
 * @property-read int $user_id User identifier of the managed bot whose access settings will be returned
 *
 * @see https://core.telegram.org/bots/api#getmanagedbotaccesssettings
 */
class GetManagedBotAccessSettingsMethod extends TelegramMethod
{
    protected string $method = 'getManagedBotAccessSettings';
    protected array $expect = ['BotAccessSettings'];

    public function __construct(
        public readonly int $user_id,
    ) {
    }
}
