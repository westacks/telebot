<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the current bot short description for the given user language. Returns BotShortDescription on success.
 *
 * @property-read ?string $language_code A two-letter ISO 639-1 language code or an empty string
 *
 * @see https://core.telegram.org/bots/api#getmyshortdescription
 */
class GetMyShortDescriptionMethod extends TelegramMethod
{
    protected string $method = 'getMyShortDescription';
    protected array $expect = ['BotShortDescription'];

    public function __construct(
        public readonly ?string $language_code,
    ) {
    }
}
