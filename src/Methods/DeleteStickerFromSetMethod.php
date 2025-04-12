<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to delete a sticker from a set created by the bot. Returns True on success.
 *
 * @property-read string $sticker File identifier of the sticker
 *
 * @see https://core.telegram.org/bots/api#deletestickerfromset
 */
class DeleteStickerFromSetMethod extends TelegramMethod
{
    protected string $method = 'deleteStickerFromSet';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $sticker,
    ) {
    }
}
