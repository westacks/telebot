<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\BotShortDescription;

/**
 * Use this method to get the current bot short description for the given user language. Returns [BotShortDescription](https://core.telegram.org/bots/api#botshortdescription) on success.
 *
 * @property string $language_code __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 */
class GetMyShortDescriptionMethod extends TelegramMethod
{
    protected string $method = 'getMyShortDescription';

    protected string $expect = 'BotShortDescription';

    protected array $parameters = [
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return new BotShortDescription([
            'short_description' => 'Bot short description',
        ]);
    }
}
