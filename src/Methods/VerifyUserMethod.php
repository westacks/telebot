<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Verifies a user on behalf of the organization which is represented by the bot. Returns True on success.
 *
 * @property int    $user_id            __Required: Yes__. Unique identifier of the target user
 * @property string $custom_description __Required: Optional__. Custom description for the verification; 0-70 characters. Must be empty if the organization isn't allowed to provide a custom verification description.
 */
class VerifyUserMethod extends TelegramMethod
{
    protected string $method = 'verifyUser';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'custom_description' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
