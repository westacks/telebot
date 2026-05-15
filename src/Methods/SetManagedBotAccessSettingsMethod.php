<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change the access settings of a managed bot. Returns True on success.
 *
 * @property-read int $user_id User identifier of the managed bot whose access settings will be changed
 * @property-read bool $is_access_restricted Pass True, if only selected users can access the bot. The bot's owner can always access it.
 * @property-read ?int[] $added_user_ids A JSON-serialized list of up to 10 identifiers of users who will have access to the bot in addition to its owner. Ignored if is_access_restricted is false.
 *
 * @see https://core.telegram.org/bots/api#setmanagedbotaccesssettings
 */
class SetManagedBotAccessSettingsMethod extends TelegramMethod
{
    protected string $method = 'setManagedBotAccessSettings';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly bool $is_access_restricted,
        public readonly ?array $added_user_ids,
    ) {
    }
}
