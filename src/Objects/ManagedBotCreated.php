<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about the bot that was created to be managed by the current bot.
 * @property-read User $bot Information about the bot. The bot's token can be fetched using the method getManagedBotToken.
 *
 * @see https://core.telegram.org/bots/api#managedbotcreated
 */
class ManagedBotCreated extends TelegramObject
{
    public function __construct(
        public readonly User $bot,
    ) {
    }
}
