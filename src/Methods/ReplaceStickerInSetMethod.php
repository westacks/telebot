<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputSticker;

/**
 * Use this method to replace an existing sticker in a sticker set with a new one. The method is equivalent to calling deleteStickerFromSet, then addStickerToSet, then setStickerPositionInSet. Returns True on success.
 *
 * @property-read int $user_id User identifier of the sticker set owner
 * @property-read string $name Sticker set name
 * @property-read string $old_sticker File identifier of the replaced sticker
 * @property-read InputSticker $sticker A JSON-serialized object with information about the added sticker. If exactly the same sticker had already been added to the set, then the set remains unchanged.
 *
 * @see https://core.telegram.org/bots/api#replacestickerinset
 */
class ReplaceStickerInSetMethod extends TelegramMethod
{
    protected string $method = 'replaceStickerInSet';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly string $name,
        public readonly string $old_sticker,
        public readonly InputSticker $sticker,
    ) {
    }
}
