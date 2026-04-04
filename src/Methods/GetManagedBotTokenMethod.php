<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the token of a managed bot. Returns the token as String on success.
 *
 * @property-read int $user_id User identifier of the managed bot whose token will be returned
 *
 * @see https://core.telegram.org/bots/api#getmanagedbottoken
 */
class GetManagedBotTokenMethod extends TelegramMethod
{
    protected string $method = 'getManagedBotToken';
    protected array $expect = ['string'];

    public function __construct(
        public readonly int $user_id,
    ) {
    }
}
