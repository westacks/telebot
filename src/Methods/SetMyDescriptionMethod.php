<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True on success.
 *
 * @property string $description   __Required: Optional__. New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for the given language.
 * @property string $language_code __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for whose language there is no dedicated description.
 */
class SetMyDescriptionMethod extends TelegramMethod
{
    protected string $method = 'setMyDescription';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'description' => 'string',
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
