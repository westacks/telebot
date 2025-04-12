<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Changes the bio of a managed business account. Requires the can_change_bio business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read ?string $bio The new value of the bio for the business account; 0-140 characters
 *
 * @see https://core.telegram.org/bots/api#setbusinessaccountbio
 */
class SetBusinessAccountBioMethod extends TelegramMethod
{
    protected string $method = 'setBusinessAccountBio';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly ?string $bio,
    ) {
    }
}
