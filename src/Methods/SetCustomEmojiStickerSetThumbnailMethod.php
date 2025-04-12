<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
 *
 * @property-read string $name Sticker set name
 * @property-read ?string $custom_emoji_id Custom emoji identifier of a sticker from the sticker set; pass an empty string to drop the thumbnail and use the first sticker as the thumbnail.
 *
 * @see https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
 */
class SetCustomEmojiStickerSetThumbnailMethod extends TelegramMethod
{
    protected string $method = 'setCustomEmojiStickerSetThumbnail';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $name,
        public readonly ?string $custom_emoji_id,
    ) {
    }
}
