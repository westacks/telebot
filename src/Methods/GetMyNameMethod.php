<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the current bot name for the given user language. Returns BotName on success.
 *
 * @property-read ?string $language_code A two-letter ISO 639-1 language code or an empty string
 *
 * @see https://core.telegram.org/bots/api#getmyname
 */
class GetMyNameMethod extends TelegramMethod
{
    protected string $method = 'getMyName';
    protected array $expect = ['BotName'];

    public function __construct(
        public readonly ?string $language_code,
    ) {
    }
}
