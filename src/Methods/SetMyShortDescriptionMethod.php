<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot. Returns True on success.
 *
 * @property string $short_description __Required: Optional__. New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated short description for the given language.
 * @property string $language_code     __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users for whose language there is no dedicated short description.
 */
class SetMyShortDescriptionMethod extends TelegramMethod
{
    protected string $method = 'setMyShortDescription';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'short_description' => 'string',
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
