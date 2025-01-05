<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to delete a sticker set that was created by the bot. Returns True on success.
 *
 * @property string $name __Required: Yes__. Sticker set name
 */
class DeleteStickerSetMethod extends TelegramMethod
{
    protected string $method = 'deleteStickerSet';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'name' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
