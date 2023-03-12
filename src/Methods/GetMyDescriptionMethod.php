<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\BotDescription;

/**
 * Use this method to get the current bot description for the given user language. Returns [BotDescription](https://core.telegram.org/bots/api#botdescription) on success.
 *
 * @property string $language_code __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 */
class GetMyDescriptionMethod extends TelegramMethod
{
    protected string $method = 'getMyDescription';

    protected string $expect = 'BotDescription';

    protected array $parameters = [
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return new BotDescription([
            'description' => 'Bot description',
        ]);
    }
}
