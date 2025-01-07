<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Sticker;

/**
 * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of [Sticker](https://core.telegram.org/bots/api#sticker) objects.
 *
 * @property string[] $custom_emoji_ids __Required: Yes__. A JSON-serialized list of custom emoji identifiers. At most 200 custom emoji identifiers can be specified.
 */
class GetCustomEmojiStickersMethod extends TelegramMethod
{
    protected string $method = 'getCustomEmojiStickers';

    protected string $expect = 'Sticker[]';

    protected array $parameters = [
        'custom_emoji_ids' => 'string[]',
    ];

    public function mock($arguments)
    {
        return [
            new Sticker([]),
        ];
    }
}
