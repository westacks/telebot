<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\BotName;

/**
 * Use this method to get the current bot name for the given user language. Returns [BotName](https://core.telegram.org/bots/api#botname) on success.
 *
 * @property string $language_code __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 */
class GetMyNameMethod extends TelegramMethod
{
    protected string $method = 'getMyName';

    protected string $expect = 'BotName';

    protected array $parameters = [
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return new BotName([
            'name' => 'Bot Name',
        ]);
    }
}
