<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A custom emoji.
 * @property-read string $type Type of the emoji, always “custom_emoji”
 * @property-read string $custom_emoji_id Identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker.
 *
 * @see https://core.telegram.org/bots/api#emojitypecustomemoji
 */
class EmojiTypeCustomEmoji extends EmojiType
{
    public function __construct(
        public readonly string $type,
        public readonly string $custom_emoji_id,
    ) {
    }
}
