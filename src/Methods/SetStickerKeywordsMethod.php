<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
 *
 * @property-read string $sticker File identifier of the sticker
 * @property-read ?string[] $keywords A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64 characters
 *
 * @see https://core.telegram.org/bots/api#setstickerkeywords
 */
class SetStickerKeywordsMethod extends TelegramMethod
{
    protected string $method = 'setStickerKeywords';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $sticker,
        public readonly ?array $keywords,
    ) {
    }
}
