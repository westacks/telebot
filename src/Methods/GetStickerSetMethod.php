<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to get a sticker set. On success, a [StickerSet](https://core.telegram.org/bots/api#stickerset) object is returned.
 *
 * @property string $name __Required: Yes__. Name of the sticker set
 */
class GetStickerSetMethod extends TelegramMethod
{
    protected string $method = 'getStickerSet';

    protected string $expect = 'StickerSet';

    protected array $parameters = [
        'name' => 'string',
    ];
}
