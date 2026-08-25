<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A custom emoji.
 * @property-read string $type Type of the rich text, always “custom_emoji”
 * @property-read string $custom_emoji_id Unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker.
 * @property-read string $alternative_text Alternative emoji for the custom emoji
 *
 * @see https://core.telegram.org/bots/api#richtextcustomemoji
 */
class RichTextCustomEmoji extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly string $custom_emoji_id,
        public readonly string $alternative_text,
    ) {
    }
}
