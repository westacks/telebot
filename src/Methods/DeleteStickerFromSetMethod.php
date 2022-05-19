<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to delete a sticker from a set created by the bot. Returns True on success.
 *
 * @property string $sticker __Required: Yes__. File identifier of the sticker
 */
class DeleteStickerFromSetMethod extends TelegramMethod
{
    protected string $method = 'deleteStickerFromSet';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'sticker' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
