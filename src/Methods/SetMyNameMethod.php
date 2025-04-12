<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change the bot's name. Returns True on success.
 *
 * @property-read ?string $name New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given language.
 * @property-read ?string $language_code A two-letter ISO 639-1 language code. If empty, the name will be shown to all users for whose language there is no dedicated name.
 *
 * @see https://core.telegram.org/bots/api#setmyname
 */
class SetMyNameMethod extends TelegramMethod
{
    protected string $method = 'setMyName';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?string $name,
        public readonly ?string $language_code,
    ) {
    }
}
