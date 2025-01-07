<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Removes verification from a user who is currently verified on behalf of the organization represented by the bot. Returns True on success.
 *
 * @property int $user_id __Required: Yes__. Unique identifier of the target user
 */
class RemoveUserVerificationMethod extends TelegramMethod
{
    protected string $method = 'removeUserVerification';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
