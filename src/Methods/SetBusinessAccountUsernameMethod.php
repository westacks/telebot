<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Changes the username of a managed business account. Requires the can_change_username business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read ?string $username The new value of the username for the business account; 0-32 characters
 *
 * @see https://core.telegram.org/bots/api#setbusinessaccountusername
 */
class SetBusinessAccountUsernameMethod extends TelegramMethod
{
    protected string $method = 'setBusinessAccountUsername';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly ?string $username,
    ) {
    }
}
