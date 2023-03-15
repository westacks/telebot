<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
 *
 * @property string   $sticker  __Required: Yes__. File identifier of the sticker
 * @property string[] $keywords __Required: Optional__. A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64 characters
 */
class SetStickerKeywordsMethod extends TelegramMethod
{
    protected string $method = 'setStickerKeywords';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'sticker' => 'string',
        'keywords' => 'string[]',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
