<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to set the title of a created sticker set. Returns True on success.
 *
 * @property string $name  __Required: Yes__. Sticker set name
 * @property string $title __Required: Yes__. Sticker set title, 1-64 characters
 */
class SetStickerSetTitleMethod extends TelegramMethod
{
    protected string $method = 'setStickerSetTitle';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'name' => 'string',
        'title' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
