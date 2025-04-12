<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a sticker set.
 * @property-read string $name Sticker set name
 * @property-read string $title Sticker set title
 * @property-read string $sticker_type Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
 * @property-read Sticker[] $stickers List of all set stickers
 * @property-read ?PhotoSize $thumbnail Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
 *
 * @see https://core.telegram.org/bots/api#stickerset
 */
class StickerSet extends TelegramObject
{
    public function __construct(
        public readonly string $name,
        public readonly string $title,
        public readonly string $sticker_type,
        public readonly array $stickers,
        public readonly ?PhotoSize $thumbnail,
    ) {
    }
}
