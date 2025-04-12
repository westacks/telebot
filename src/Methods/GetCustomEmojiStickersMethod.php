<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
 *
 * @property-read string[] $custom_emoji_ids A JSON-serialized list of custom emoji identifiers. At most 200 custom emoji identifiers can be specified.
 *
 * @see https://core.telegram.org/bots/api#getcustomemojistickers
 */
class GetCustomEmojiStickersMethod extends TelegramMethod
{
    protected string $method = 'getCustomEmojiStickers';
    protected array $expect = ['Sticker[]'];

    public function __construct(
        public readonly array $custom_emoji_ids,
    ) {
    }
}
