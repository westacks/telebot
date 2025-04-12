<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to delete a sticker set that was created by the bot. Returns True on success.
 *
 * @property-read string $name Sticker set name
 *
 * @see https://core.telegram.org/bots/api#deletestickerset
 */
class DeleteStickerSetMethod extends TelegramMethod
{
    protected string $method = 'deleteStickerSet';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $name,
    ) {
    }
}
