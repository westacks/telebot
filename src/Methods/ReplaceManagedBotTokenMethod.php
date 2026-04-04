<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to revoke the current token of a managed bot and generate a new one. Returns the new token as String on success.
 *
 * @property-read int $user_id User identifier of the managed bot whose token will be replaced
 *
 * @see https://core.telegram.org/bots/api#replacemanagedbottoken
 */
class ReplaceManagedBotTokenMethod extends TelegramMethod
{
    protected string $method = 'replaceManagedBotToken';
    protected array $expect = ['string'];

    public function __construct(
        public readonly int $user_id,
    ) {
    }
}
