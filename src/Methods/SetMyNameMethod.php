<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to change the bot's name. Returns True on success.
 *
 * @property string $name          __Required: Optional__. New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given language.
 * @property string $language_code __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the name will be shown to all users for whose language there is no dedicated name.
 */
class SetMyNameMethod extends TelegramMethod
{
    protected string $method = 'setMyName';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'name' => 'string',
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
