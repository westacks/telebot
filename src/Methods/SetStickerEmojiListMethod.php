<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
 *
 * @property string   $sticker    __Required: Yes__. File identifier of the sticker
 * @property string[] $emoji_list __Required: Yes__. A JSON-serialized list of 1-20 emoji associated with the sticker
 */
class SetStickerEmojiListMethod extends TelegramMethod
{
    protected string $method = 'setStickerEmojiList';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'sticker' => 'string',
        'emoji_list' => 'string[]',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
