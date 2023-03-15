<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
 *
 * @property string $name            __Required: Yes__. Sticker set name
 * @property string $custom_emoji_id __Required: Optional__. Custom emoji identifier of a sticker from the sticker set; pass an empty string to drop the thumbnail and use the first sticker as the thumbnail.
 */
class SetCustomEmojiStickerSetThumbnailMethod extends TelegramMethod
{
    protected string $method = 'setCustomEmojiStickerSetThumbnail';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'name' => 'string',
        'custom_emoji_id' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
