<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get a sticker set. On success, a StickerSet object is returned.
 *
 * @property-read string $name Name of the sticker set
 *
 * @see https://core.telegram.org/bots/api#getstickerset
 */
class GetStickerSetMethod extends TelegramMethod
{
    protected string $method = 'getStickerSet';
    protected array $expect = ['StickerSet'];

    public function __construct(
        public readonly string $name,
    ) {
    }
}
