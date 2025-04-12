<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the current bot description for the given user language. Returns BotDescription on success.
 *
 * @property-read ?string $language_code A two-letter ISO 639-1 language code or an empty string
 *
 * @see https://core.telegram.org/bots/api#getmydescription
 */
class GetMyDescriptionMethod extends TelegramMethod
{
    protected string $method = 'getMyDescription';
    protected array $expect = ['BotDescription'];

    public function __construct(
        public readonly ?string $language_code,
    ) {
    }
}
