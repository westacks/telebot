<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Removes verification from a chat that is currently verified on behalf of the organization represented by the bot. Returns True on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 */
class RemoveChatVerificationMethod extends TelegramMethod
{
    protected string $method = 'removeChatVerification';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
