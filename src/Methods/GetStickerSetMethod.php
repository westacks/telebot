<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\StickerSet;

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

    public function mock($arguments)
    {
        return new StickerSet([
            'name' => $arguments['name'],
            'title' => 'title',
            'contains_masks' => false,
            'stickers' => [
                [
                    'file_id' => 'file_id',
                    'width' => 100,
                    'height' => 100,
                    'is_animated' => false,
                    'thumbnail' => [
                        'file_id' => 'file_id',
                        'width' => 100,
                        'height' => 100,
                    ],
                ],
            ],
        ]);
    }
}
