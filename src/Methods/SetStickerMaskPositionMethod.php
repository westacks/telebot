<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\MaskPosition;

/**
 * Use this method to change the mask position of a mask sticker. The sticker must belong to a sticker set that was created by the bot. Returns True on success.
 *
 * @property-read string $sticker File identifier of the sticker
 * @property-read ?MaskPosition $mask_position A JSON-serialized object with the position where the mask should be placed on faces. Omit the parameter to remove the mask position.
 *
 * @see https://core.telegram.org/bots/api#setstickermaskposition
 */
class SetStickerMaskPositionMethod extends TelegramMethod
{
    protected string $method = 'setStickerMaskPosition';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $sticker,
        public readonly ?MaskPosition $mask_position,
    ) {
    }
}
