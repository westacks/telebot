<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about the creation or token update of a bot that is managed by the current bot.
 * @property-read User $user User that created the bot
 * @property-read User $bot Information about the bot. Token of the bot can be fetched using the method getManagedBotToken.
 *
 * @see https://core.telegram.org/bots/api#managedbotupdated
 */
class ManagedBotUpdated extends TelegramObject
{
    public function __construct(
        public readonly User $user,
        public readonly User $bot,
    ) {
    }
}
