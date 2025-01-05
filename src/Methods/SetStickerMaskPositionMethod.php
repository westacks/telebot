<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MaskPosition;

/**
 * Use this method to change the [mask position](https://core.telegram.org/bots/api#maskposition) of a mask sticker. The sticker must belong to a sticker set that was created by the bot. Returns True on success.
 *
 * @property string       $sticker       __Required: Yes__. File identifier of the sticker
 * @property MaskPosition $mask_position __Required: Optional__. A JSON-serialized object with the position where the mask should be placed on faces. Omit the parameter to remove the mask position.
 */
class SetStickerMaskPositionMethod extends TelegramMethod
{
    protected string $method = 'setStickerMaskPosition';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'sticker' => 'string',
        'mask_position' => 'MaskPosition',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
