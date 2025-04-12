<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
 *
 * @property-read string $sticker File identifier of the sticker
 * @property-read string[] $emoji_list A JSON-serialized list of 1-20 emoji associated with the sticker
 *
 * @see https://core.telegram.org/bots/api#setstickeremojilist
 */
class SetStickerEmojiListMethod extends TelegramMethod
{
    protected string $method = 'setStickerEmojiList';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $sticker,
        public readonly array $emoji_list,
    ) {
    }
}
