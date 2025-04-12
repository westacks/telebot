<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Verifies a user on behalf of the organization which is represented by the bot. Returns True on success.
 *
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ?string $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization isn't allowed to provide a custom verification description.
 *
 * @see https://core.telegram.org/bots/api#verifyuser
 */
class VerifyUserMethod extends TelegramMethod
{
    protected string $method = 'verifyUser';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly ?string $custom_description,
    ) {
    }
}
