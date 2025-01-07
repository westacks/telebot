<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputSticker;

/**
 * Use this method to replace an existing sticker in a sticker set with a new one. The method is equivalent to calling [deleteStickerFromSet](https://core.telegram.org/bots/api#deletestickerfromset), then [addStickerToSet](https://core.telegram.org/bots/api#addstickertoset), then [setStickerPositionInSet](https://core.telegram.org/bots/api#setstickerpositioninset). Returns True on success.
 *
 * @property int          $user_id     __Required: Yes__. User identifier of the sticker set owner
 * @property string       $name        __Required: Yes__. Sticker set name
 * @property string       $old_sticker __Required: Yes__. File identifier of the replaced sticker
 * @property InputSticker $sticker     __Required: Yes__. A JSON-serialized object with information about the added sticker. If exactly the same sticker had already been added to the set, then the set remains unchanged.
 */
class ReplaceStickerInSetMethod extends TelegramMethod
{
    protected string $method = 'replaceStickerInSet';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'name' => 'string',
        'old_sticker' => 'string',
        'sticker' => 'InputSticker',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
