<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Verifies a chat on behalf of the organization which is represented by the bot. Returns True on success.
 *
 * @property string $chat_id            __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property string $custom_description __Required: Optional__. Custom description for the verification; 0-70 characters. Must be empty if the organization isn't allowed to provide a custom verification description.
 */
class VerifyChatMethod extends TelegramMethod
{
    protected string $method = 'verifyChat';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'custom_description' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
