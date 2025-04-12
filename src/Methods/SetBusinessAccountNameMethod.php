<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Changes the first and last name of a managed business account. Requires the can_change_name business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read string $first_name The new value of the first name for the business account; 1-64 characters
 * @property-read ?string $last_name The new value of the last name for the business account; 0-64 characters
 *
 * @see https://core.telegram.org/bots/api#setbusinessaccountname
 */
class SetBusinessAccountNameMethod extends TelegramMethod
{
    protected string $method = 'setBusinessAccountName';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly string $first_name,
        public readonly ?string $last_name,
    ) {
    }
}
