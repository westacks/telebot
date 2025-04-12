<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to set the title of a created sticker set. Returns True on success.
 *
 * @property-read string $name Sticker set name
 * @property-read string $title Sticker set title, 1-64 characters
 *
 * @see https://core.telegram.org/bots/api#setstickersettitle
 */
class SetStickerSetTitleMethod extends TelegramMethod
{
    protected string $method = 'setStickerSetTitle';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $name,
        public readonly string $title,
    ) {
    }
}
