<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Removes verification from a user who is currently verified on behalf of the organization represented by the bot. Returns True on success.
 *
 * @property-read int $user_id Unique identifier of the target user
 *
 * @see https://core.telegram.org/bots/api#removeuserverification
 */
class RemoveUserVerificationMethod extends TelegramMethod
{
    protected string $method = 'removeUserVerification';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
    ) {
    }
}
