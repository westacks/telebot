<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputSticker;

/**
 * Use this method to add a new sticker to a set created by the bot. Emoji sticker sets can have up to 200 stickers. Other sticker sets can have up to 120 stickers. Returns True on success.
 *
 * @property-read int $user_id User identifier of sticker set owner
 * @property-read string $name Sticker set name
 * @property-read InputSticker $sticker A JSON-serialized object with information about the added sticker. If exactly the same sticker had already been added to the set, then the set isn't changed.
 *
 * @see https://core.telegram.org/bots/api#addstickertoset
 */
class AddStickerToSetMethod extends TelegramMethod
{
    protected string $method = 'addStickerToSet';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly string $name,
        public readonly InputSticker $sticker,
    ) {
    }
}
