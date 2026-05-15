<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the access settings of a bot.
 * @property-read bool $is_access_restricted True, if only selected users can access the bot. The bot's owner can always access it.
 * @property-read ?User[] $added_users Optional. The list of other users who have access to the bot if the access is restricted
 *
 * @see https://core.telegram.org/bots/api#botaccesssettings
 */
class BotAccessSettings extends TelegramObject
{
    public function __construct(
        public readonly bool $is_access_restricted,
        public readonly ?array $added_users,
    ) {
    }
}
